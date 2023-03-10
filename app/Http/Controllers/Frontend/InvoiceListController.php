<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceListRequest;
use App\Http\Requests\StoreInvoiceListRequest;
use App\Http\Requests\UpdateInvoiceListRequest;
use App\Models\InvoiceList;
use App\Models\MemberFund;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Publisher;
use App\Models\InvoiceItem;
use Carbon\Carbon;
use App\Models\User;
use App\Models\BookFest;

class InvoiceListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfest = BookFest::where('status', 'active')->latest()->first();
        

        $invoiceLists = InvoiceList::with(['member_fund', 'bookfest', 'created_by'])
                            ->where( 'bookfest_id', $bookfest?->id )
                            ->withSum('invoiceListInvoiceItems', 'amount')
//                            ->withSum('invoiceListInvoiceItems', 'gross')
  //                          ->withSum('invoiceListInvoiceItems', 'discount')
                            ->get();


     
        return view('frontend.invoiceLists.index', compact('invoiceLists', 'bookfest'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfest = BookFest::where('status', 'active')->latest()->first();
     

        $user_constituencies =  User::find( auth()->user()->id )->constituencies()->pluck('id');
        $member_funds = MemberFund::whereIn('constituency_id', $user_constituencies)
        ->where('bookfest_id', $bookfest->id)
        ->get()
        ->mapWithKeys(function ($x) {
            return [$x->id => $x->mla->name . ' (' .$x->constituency->name . ')'];
        }) ->prepend(trans('global.pleaseSelect') . ' Member', '');;

      
        $start_date = Carbon::createFromFormat('d/m/Y', $bookfest->from);
        $end_date = Carbon::createFromFormat('d/m/Y', $bookfest->to);

        $dates = array();

        for($date = $start_date->copy(); $date->lte($end_date); $date->addDay()) {
            $dates[$date->format('d')] = $date->format('d/m/Y');
        }

                
        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.invoiceLists.create', compact('member_funds', 'publishers', 'dates'));
    }

    public function store(StoreInvoiceListRequest $request)
    {
        $requestData = collect($request->only('publisher_id', 'bill_number', 'bill_date','amount', 'gross', 'discount'))
                     ->transpose(['publisher_id', 'bill_number', 'bill_date','amount', 'gross', 'discount']);

        
        //check dates
        $bookfest = BookFest::where('status', 'active')->latest()->first();
   
        $datemin = Carbon::createFromFormat('d/m/Y', $bookfest->from);
        $datemax = Carbon::createFromFormat('d/m/Y', $bookfest->to);
   
        foreach ($requestData as $item) {
            $date = Carbon::createFromFormat('d/m/Y', $item['bill_date']);
            if(!$date->betweenIncluded($datemin, $datemax)){
                return  back()->withInput()->withErrors(['Date ' . $item['bill_date'] . ' not within '. $bookfest->from . ' and '. $bookfest->to]);;
            }
       
             //check if we have duplicate items in current form
             $itemsincurrentform = $requestData->where( 'bill_number', $item['bill_number'] )
                            ->where( 'publisher_id',  $item['publisher_id'] )
                            ->where( 'bill_date',  $item['bill_date'] )
                            ->count();
            if($itemsincurrentform > 1){
                return back()->withInput()->withErrors(['Bill No.' .  $item['bill_number'] . ' (' . $item['bill_date'] . ') entered more than once.']);
            }
                        
            
            //also check for same billno of same publisher for the same date
            $date = Carbon::createFromFormat('d/m/Y', $item['bill_date'])->format('Y-m-d');
            $invoiceitem_existing = InvoiceItem::where( 'bill_number', $item['bill_number'] )
                            ->where( 'publisher_id',  $item['publisher_id'] )
                            ->whereDate( 'bill_date',  $date  )
                            ->first();
       

            if($invoiceitem_existing){
                return back()->withInput()->withErrors(['Bill No.' .  $item['bill_number'] . ' (' . $item['bill_date'] . ') already entered in list #'. $invoiceitem_existing->invoice_list->id]);
            }



        }
        if(!$bookfest){
            return  back()->withInput()->withErrors(['No active bookfest found']);;
        }
//dd($bookfest->id);
        $invoiceList = InvoiceList::create($request->only( 'number', 'institution_type', 'institution_name', 'member_fund_id' )
            + [ 'bookfest_id' => $bookfest->id] );

        $invoiceitems = [];
        foreach ($requestData as $item) {
            $invoiceitems[] = new InvoiceItem([
                'publisher_id' => $item['publisher_id'],
                'bill_number' => $item['bill_number'],
                'bill_date' => $item['bill_date'],
                'gross' => $item['gross'],
                'discount' => $item['discount'],
                'amount' => $item['amount'],
            ]);
        }

        $invoiceList->invoiceListInvoiceItems()->saveMany($invoiceitems);
 
       if($request->action == 'saveandnew'){
            return redirect()->route('frontend.invoice-lists.create')
            ->with('message','Invoice for ' . $invoiceList->institution_name  . ' created successfully. ' . 'ID: ' . $invoiceList->id)
            ->withInput($request->only('member_fund_id'));
       }

       return redirect()->route('frontend.invoice-lists.index')
                    ->with('message','Invoice for ' . $invoiceList->institution_name  . ' created successfully. ' . 'ID: ' . $invoiceList->id);
    }

    public function edit(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfest = BookFest::where('status', 'active')->latest()->first();

        $user_constituencies =  User::find( auth()->user()->id )->constituencies()->pluck('id');
        
        $member_funds = MemberFund::whereIn('constituency_id', $user_constituencies)
        ->where('bookfest_id', $bookfest->id)
        ->get()
        ->mapWithKeys(function ($x) {
            return [$x->id => $x->mla->name . ' (' .$x->constituency->name . ')'];
        }) ->prepend(trans('global.pleaseSelect') . ' Member', '');;

        $start_date = Carbon::createFromFormat('d/m/Y', $bookfest->from);
        $end_date = Carbon::createFromFormat('d/m/Y', $bookfest->to);

        $dates = array();

        for($date = $start_date->copy(); $date->lte($end_date); $date->addDay()) {
            $dates[$date->format('d')] = $date->format('d/m/Y');
        }

        
        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoiceList->load('member_fund', 'created_by');
        $invoiceList->load('invoiceListInvoiceItems');

        return view('frontend.invoiceLists.edit', compact('invoiceList', 'member_funds', 'publishers', 'dates'));
    }

    public function update(UpdateInvoiceListRequest $request, InvoiceList $invoiceList)
    {
       

        $requestData = collect($request->only('publisher_id', 'bill_number', 'bill_date','amount', 'gross', 'discount'))
                        ->transpose(['publisher_id', 'bill_number', 'bill_date','amount', 'gross', 'discount']);
                       
     
         //check dates
        $bookfest = BookFest::where('status', 'active')->latest()->first();

        $datemin = Carbon::createFromFormat('d/m/Y', $bookfest->from);
        $datemax = Carbon::createFromFormat('d/m/Y', $bookfest->to);
         
        foreach ($requestData as $item) {
          
            $date = Carbon::createFromFormat('d/m/Y', $item['bill_date']);
            if(!$date->betweenIncluded($datemin, $datemax)){
                return  back()->withInput()->withErrors(['Date ' . $item['bill_date'] . ' not within '. $bookfest->from . ' and '. $bookfest->to]);;
            }

            //check if we have duplicate items in current form
            $itemsincurrentform = $requestData->where( 'bill_number', $item['bill_number'] )
                                            ->where( 'publisher_id',  $item['publisher_id'] )
                                            ->where( 'bill_date',  $item['bill_date'] )
                                            ->count();
            if($itemsincurrentform > 1){
                return back()->withInput()->withErrors(['Bill No.' .  $item['bill_number'] . ' (' . $item['bill_date'] . ') entered more than once.']);
            }
                                            
            
            //also check for same billno of same publisher for the same date
            $date = Carbon::createFromFormat('d/m/Y', $item['bill_date'])->format('Y-m-d');
            $invoiceitem_existing = InvoiceItem::where( 'bill_number', $item['bill_number'] )
                            ->where( 'publisher_id',  $item['publisher_id'] )
                            ->whereDate( 'bill_date',  $date  )
                            ->where( 'invoice_list_id', '<>',$invoiceList->id  ) //exclude us.
                            ->first();
       

            if($invoiceitem_existing){
                return back()->withInput()->withErrors(['Bill No.' .  $item['bill_number'] . ' (' . $item['bill_date'] . ') already entered in list #'. $invoiceitem_existing->invoice_list->id]);
            }
        }

      
        $invoiceList->invoiceListInvoiceItems()->delete();
        $invoiceList->update($request->only( 'number', 'institution_type', 'institution_name', 'member_fund_id' ));
 
        $invoiceitems = [];
      
        foreach ($requestData as $item) {
            $invoiceitems[] = new InvoiceItem([
                'publisher_id' => $item['publisher_id'],
                'bill_number' => $item['bill_number'],
                'bill_date' => $item['bill_date'],
                'gross' => $item['gross'],
                'discount' => $item['discount'],
                'amount' => $item['amount'],
            ]);
        }

        $invoiceList->invoiceListInvoiceItems()->saveMany($invoiceitems);
              

        return redirect()->route('frontend.invoice-lists.index');
    }

    public function show(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceList->load('member_fund', 'created_by', 'invoiceListInvoiceItems');
        $invoiceListInvoiceItems = $invoiceList->invoiceListInvoiceItems;

        $totalsum = $invoiceListInvoiceItems->sum('amount');

      
        return view('frontend.invoiceLists.show', compact('invoiceList', 'totalsum'));
    }

    public function destroy(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceList->invoiceListInvoiceItems()->delete();

        $invoiceList->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceListRequest $request)
    {
        InvoiceList::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
