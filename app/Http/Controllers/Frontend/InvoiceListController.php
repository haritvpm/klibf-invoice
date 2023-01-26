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

      
        $datemin =  $bookfest->from;
        $datemax =  $bookfest->to;
                
        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.invoiceLists.create', compact('member_funds', 'publishers', 'datemin', 'datemax'));
    }

    public function store(StoreInvoiceListRequest $request)
    {
             
        $publisher_ids = $request->get('publisher_id');
        $bill_numbers = $request->get('bill_number');
        $bill_dates = $request->get('bill_date');
        $grosss = $request->get('gross');
        $discounts = $request->get('discount');
        $amounts = $request->get('amount');
        
        //check dates
        $bookfest = BookFest::where('status', 'active')->latest()->first();
   
        $datemin = Carbon::createFromFormat('d/m/Y', $bookfest->from);
        $datemax = Carbon::createFromFormat('d/m/Y', $bookfest->to);
   
        foreach ($bill_dates as $i => $bill_date) {
             $date = Carbon::createFromFormat('d/m/Y', $bill_date);
             if(!$date->betweenIncluded($datemin, $datemax)){
                return  back()->withInput()->withErrors(['Date ' . $bill_date . ' not within '. $bookfest->from . ' and '. $bookfest->to]);;
             }
        }
        if(!$bookfest){
            return  back()->withInput()->withErrors(['No active bookfest found']);;
        }
//dd($bookfest->id);
        $invoiceList = InvoiceList::create($request->only( 'number', 'institution_type', 'institution_name', 'member_fund_id' )
            + [ 'bookfest_id' => $bookfest->id] );

        $invoiceitems = [];
      
        foreach ($publisher_ids as $i => $publisher_id) {
            $invoiceitems[] = new InvoiceItem([
                'publisher_id' => $publisher_id,
                'bill_number' => $bill_numbers[$i],
                'bill_date' => $bill_dates[$i],
                'gross' => $grosss[$i],
                'discount' => $discounts[$i],
                'amount' => $amounts[$i],
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


        
        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoiceList->load('member_fund', 'created_by');
        $invoiceList->load('invoiceListInvoiceItems');

        return view('frontend.invoiceLists.edit', compact('invoiceList', 'member_funds', 'publishers'));
    }

    public function update(UpdateInvoiceListRequest $request, InvoiceList $invoiceList)
    {
       
        $publisher_ids = $request->get('publisher_id');
        $bill_numbers = $request->get('bill_number');
        $bill_dates = $request->get('bill_date');
        $amounts = $request->get('amount');
        $grosss = $request->get('gross');
        $discounts = $request->get('discount');


         //check dates
        $bookfest = BookFest::where('status', 'active')->latest()->first();

        $datemin = Carbon::createFromFormat('d/m/Y', $bookfest->from);
        $datemax = Carbon::createFromFormat('d/m/Y', $bookfest->to);
         
         foreach ($bill_dates as $i => $bill_date) {
              $date = Carbon::createFromFormat('d/m/Y', $bill_date);
              if(!$date->betweenIncluded($datemin, $datemax)){
                 return  back()->withInput()->withErrors(['Date ' . $bill_date . ' not within '. $bookfest->from . ' and '. $bookfest->to]);;
              }
        }

      
        $invoiceList->invoiceListInvoiceItems()->delete();
        $invoiceList->update($request->only( 'number', 'institution_type', 'institution_name', 'member_fund_id' ));
 
        $invoiceitems = [];
      
        foreach ($publisher_ids as $i => $publisher_id) {
            $invoiceitems[] = new InvoiceItem([
                'publisher_id' => $publisher_id,
                'bill_number' => $bill_numbers[$i],
                'bill_date' => $bill_dates[$i],
                'gross' => $grosss[$i],
                'discount' => $discounts[$i],
                'amount' => $amounts[$i],
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
