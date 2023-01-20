<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceItemRequest;
use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Models\InvoiceItem;
use App\Models\InvoiceList;
use App\Models\Publisher;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItems = InvoiceItem::with(['invoice_list', 'publisher'])->get();

        return view('frontend.invoiceItems.index', compact('invoiceItems'));
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('invoice_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice_lists = InvoiceList::pluck('institution_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        //if adding to existing list, 
        if ($request->has('list-id')) {
            $invoice_lists = InvoiceList::where('id', $request->input('list-id'))
                ->pluck('institution_name', 'id');
           
        }
      
        return view('frontend.invoiceItems.create', compact('invoice_lists', 'publishers'));
    }

    public function store(StoreInvoiceItemRequest $request)
    {
        $invoiceItem = InvoiceItem::create($request->all());

      //  return redirect()->route('frontend.invoice-items.index');

        $invoiceList = $invoiceItem->invoice_list()->first();
        return view('frontend.invoiceLists.show', compact('invoiceList'));
    }

    public function edit(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       // $invoice_lists = InvoiceList::pluck('institution_name', 'id')->prepend(trans('global.pleaseSelect'), '');



        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoiceItem->load('invoice_list', 'publisher');

       
        $invoice_lists = InvoiceList::where('id',$invoiceItem->invoice_list->id )
                ->pluck('institution_name', 'id');
               

        return view('frontend.invoiceItems.edit', compact('invoiceItem', 'invoice_lists', 'publishers'));
    }

    public function update(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem)
    {
        $invoiceItem->update($request->all());

        //prevent user from viewing list item page
        
      //  return redirect()->route('frontend.invoice-items.index');
        $invoiceList = $invoiceItem->invoice_list()->first();
        return view('frontend.invoiceLists.show', compact('invoiceList'));

    }

    public function show(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItem->load('invoice_list', 'publisher');

        return view('frontend.invoiceItems.show', compact('invoiceItem'));
    }

    public function destroy(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceItemRequest $request)
    {
        InvoiceItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
