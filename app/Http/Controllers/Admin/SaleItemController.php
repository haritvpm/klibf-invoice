<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySaleItemRequest;
use App\Http\Requests\StoreSaleItemRequest;
use App\Http\Requests\UpdateSaleItemRequest;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaleItemController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sale_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saleItems = SaleItem::with(['product', 'invoice_number'])->get();

        return view('admin.saleItems.index', compact('saleItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('sale_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoice_numbers = Sale::pluck('invoice_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.saleItems.create', compact('invoice_numbers', 'products'));
    }

    public function store(StoreSaleItemRequest $request)
    {
        $saleItem = SaleItem::create($request->all());

        return redirect()->route('admin.sale-items.index');
    }

    public function edit(SaleItem $saleItem)
    {
        abort_if(Gate::denies('sale_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoice_numbers = Sale::pluck('invoice_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $saleItem->load('product', 'invoice_number');

        return view('admin.saleItems.edit', compact('invoice_numbers', 'products', 'saleItem'));
    }

    public function update(UpdateSaleItemRequest $request, SaleItem $saleItem)
    {
        $saleItem->update($request->all());

        return redirect()->route('admin.sale-items.index');
    }

    public function show(SaleItem $saleItem)
    {
        abort_if(Gate::denies('sale_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saleItem->load('product', 'invoice_number');

        return view('admin.saleItems.show', compact('saleItem'));
    }

    public function destroy(SaleItem $saleItem)
    {
        abort_if(Gate::denies('sale_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saleItem->delete();

        return back();
    }

    public function massDestroy(MassDestroySaleItemRequest $request)
    {
        SaleItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
