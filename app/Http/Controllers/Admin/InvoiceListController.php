<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\BookFest;
use App\Models\User;

class InvoiceListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceLists = InvoiceList::with(['member_fund', 'bookfest', 'created_by'])->get();

        return view('admin.invoiceLists.index', compact('invoiceLists'));
    }

    public function create()
    {
       // abort_if(Gate::denies('invoice_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
       //do not allow admin to create
        abort_if(true, Response::HTTP_FORBIDDEN, '403 Forbidden');
        
       /*
        $members = Member::get(['name','constituency', 'id'])->mapWithKeys(function ($x) {
            return [$x->id => $x->name . ' (' .$x->constituency . ')'];
        })
        ->prepend(trans('global.pleaseSelect'), '');

        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoiceLists.create', compact('members', 'publishers'));*/
    }

    public function store(StoreInvoiceListRequest $request)
    {
       // dd( $request);

        $invoiceList = InvoiceList::create($request->only( 'number', 'institution_type', 'institution_name', 'member_fund_id',    ));
       
        $publisher_ids = $request->get('publisher_id');
        $bill_numbers = $request->get('bill_number');
        $bill_dates = $request->get('bill_date');
        $amounts = $request->get('amount');
        
        $invoiceitems = [];
      
        foreach ($publisher_ids as $i => $publisher_id) {
            $invoiceitems[] = new InvoiceItem([
                'publisher_id' => $publisher_id,
                'bill_number' => $bill_numbers[$i],
                'bill_date' => $bill_dates[$i],
                'amount' => $amounts[$i],
            ]);
        }

        $invoiceList->invoiceListInvoiceItems()->saveMany($invoiceitems);

        
 
        return redirect()->route('admin.invoice-lists.index')->with('message','invoice created Successfully');;
    }

    public function edit(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfest = BookFest::where('status', 'active')->latest()->first();
  
        $user_constituencies =  User::find( $invoiceList->created_by->id )->constituencies()->pluck('id');
        $member_funds = MemberFund::whereIn('constituency_id', $user_constituencies)
        ->where('bookfest_id', $bookfest->id)
        ->get()
        ->mapWithKeys(function ($x) {
            return [$x->id => $x->mla->name . ' (' .$x->constituency->name . ')'];
        }) ->prepend(trans('global.pleaseSelect') . ' Member', '');;



        $invoiceList->load('member_fund', 'bookfest', 'created_by');

        return view('admin.invoiceLists.edit', compact('invoiceList', 'member_funds'));
    }

    public function update(UpdateInvoiceListRequest $request, InvoiceList $invoiceList)
    {
        $invoiceList->update($request->all());

        return redirect()->route('admin.invoice-lists.index');
    }

    public function show(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceList->load('member_fund', 'bookfest', 'created_by', 'invoiceListInvoiceItems');

        return view('admin.invoiceLists.show', compact('invoiceList'));
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
