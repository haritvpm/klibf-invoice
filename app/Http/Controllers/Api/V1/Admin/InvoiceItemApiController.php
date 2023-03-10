<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Http\Resources\Admin\InvoiceItemResource;
use App\Models\InvoiceItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceItemApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceItemResource(InvoiceItem::with(['invoice_list', 'publisher', 'created_by'])->get());
    }

    public function store(StoreInvoiceItemRequest $request)
    {
        $invoiceItem = InvoiceItem::create($request->all());

        return (new InvoiceItemResource($invoiceItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceItemResource($invoiceItem->load(['invoice_list', 'publisher', 'created_by']));
    }

    public function update(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem)
    {
        $invoiceItem->update($request->all());

        return (new InvoiceItemResource($invoiceItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
