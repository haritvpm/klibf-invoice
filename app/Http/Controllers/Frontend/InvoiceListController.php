<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceListRequest;
use App\Http\Requests\StoreInvoiceListRequest;
use App\Http\Requests\UpdateInvoiceListRequest;
use App\Models\InvoiceList;
use App\Models\Member;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Publisher;
use App\Models\InvoiceItem;
use Carbon\Carbon;

use App\Models\User;

class InvoiceListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceLists = InvoiceList::with(['member', 'created_by'])
                            ->withSum('invoiceListInvoiceItems', 'amount')
                            ->get();

     
        return view('frontend.invoiceLists.index', compact('invoiceLists'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       // $members = Member::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        $members = User::find( auth()->user()->id )->members()
            ->get(['name','constituency', 'id'])->mapWithKeys(function ($x) {
            return [$x->id => $x->name . ' (' .$x->constituency . ')'];
        })
        ->prepend(trans('global.pleaseSelect') . ' Member', '');

        
        
        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.invoiceLists.create', compact('members', 'publishers'));
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
        /*
        $datemin = Carbon::createFromFormat('d/m/Y', '09/01/2023');
        $datemax = Carbon::createFromFormat('d/m/Y', '15/01/2023');

        $date_ok = true;
        foreach ($bill_dates as $i => $bill_date) {
             $date = Carbon::createFromFormat('d/m/Y', $bill_date);
             if(!$date->betweenIncluded($datemin, $datemax)){
                return  redirect()->back()->withInput()->withError('Date not within range');;
             }
        }*/

        $invoiceList = InvoiceList::create($request->only( 'number', 'institution_type', 'institution_name', 'member_id' ));

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
            ->withInput($request->only('member_id'));
       }

       return redirect()->route('frontend.invoice-lists.index')
                    ->with('message','Invoice for ' . $invoiceList->institution_name  . ' created successfully. ' . 'ID: ' . $invoiceList->id);
    }

    public function edit(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $members = User::find( auth()->user()->id )->members()
            ->get(['name','constituency', 'id'])->mapWithKeys(function ($x) {
            return [$x->id => $x->name . ' (' .$x->constituency . ')'];
        })
        ->prepend(trans('global.pleaseSelect') . ' Member', '');
        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoiceList->load('member', 'created_by');
        $invoiceList->load('invoiceListInvoiceItems');

        return view('frontend.invoiceLists.edit', compact('invoiceList', 'members', 'publishers'));
    }

    public function update(UpdateInvoiceListRequest $request, InvoiceList $invoiceList)
    {
        $invoiceList->invoiceListInvoiceItems()->delete();

        $invoiceList->update($request->only( 'number', 'institution_type', 'institution_name', 'member_id' ));

        $publisher_ids = $request->get('publisher_id');
        $bill_numbers = $request->get('bill_number');
        $bill_dates = $request->get('bill_date');
        $amounts = $request->get('amount');
        $grosss = $request->get('gross');
        $discounts = $request->get('discount');

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

        $invoiceList->load('member', 'created_by', 'invoiceListInvoiceItems');
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
