<?php

namespace App\Http\Controllers\Admin;

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

class InvoiceListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceLists = InvoiceList::with(['member'])->get();

        return view('admin.invoiceLists.index', compact('invoiceLists'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $members = Member::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoiceLists.create', compact('members', 'publishers'));
    }

    public function store(StoreInvoiceListRequest $request)
    {
       // dd( $request);

        $invoiceList = InvoiceList::create($request->only( 'number', 'institution_type', 'institution_name', 'member_id',    ));
       
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

        $members = Member::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoiceList->load('member');

        return view('admin.invoiceLists.edit', compact('invoiceList', 'members', 'publishers'));
    }

    public function update(UpdateInvoiceListRequest $request, InvoiceList $invoiceList)
    {
        $invoiceList->update($request->all());

        return redirect()->route('admin.invoice-lists.index');
    }

    public function show(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceList->load('member', 'invoiceListInvoiceItems');

        return view('admin.invoiceLists.show', compact('invoiceList'));
    }

    public function destroy(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceList->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceListRequest $request)
    {
        InvoiceList::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
