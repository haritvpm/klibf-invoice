<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceListRequest;
use App\Http\Requests\UpdateInvoiceListRequest;
use App\Http\Resources\Admin\InvoiceListResource;
use App\Models\InvoiceList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceListApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceListResource(InvoiceList::with(['member_fund', 'bookfest', 'created_by'])->get());
    }

    public function store(StoreInvoiceListRequest $request)
    {
        $invoiceList = InvoiceList::create($request->all());

        return (new InvoiceListResource($invoiceList))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceListResource($invoiceList->load(['member_fund', 'bookfest', 'created_by']));
    }

    public function update(UpdateInvoiceListRequest $request, InvoiceList $invoiceList)
    {
        $invoiceList->update($request->all());

        return (new InvoiceListResource($invoiceList))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InvoiceList $invoiceList)
    {
        abort_if(Gate::denies('invoice_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceList->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
