<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySaleRequest;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\BookFest;
use App\Models\Publisher;
use App\Models\Sale;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use App\Models\Product;

class SaleController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sales = Sale::with(['bookfest', 'publisher'])->get();

        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        abort_if(Gate::denies('sale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       // $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $bookfest = BookFest::where('status', 'active')->latest()->first();

        $product_ids = DB::table('book_fest_product')->where( 'book_fest_id',$bookfest?->id )->pluck('product_id');
        $products = Product::whereIn('id', $product_ids)->get();
        

        return view('admin.sales.create', compact('products', 'publishers'));
    }

    public function store(StoreSaleRequest $request)
    {
        dd($request->all());
        $sale = Sale::create($request->all());

        return redirect()->route('admin.sales.index');
    }

    public function edit(Sale $sale)
    {
        abort_if(Gate::denies('sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sale->load('bookfest', 'publisher');

        return view('admin.sales.edit', compact('bookfests', 'publishers', 'sale'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->all());

        return redirect()->route('admin.sales.index');
    }

    public function show(Sale $sale)
    {
        abort_if(Gate::denies('sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->load('bookfest', 'publisher', 'invoiceNumberSaleItems');

        return view('admin.sales.show', compact('sale'));
    }

    public function destroy(Sale $sale)
    {
        abort_if(Gate::denies('sale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->delete();

        return back();
    }

    public function massDestroy(MassDestroySaleRequest $request)
    {
        Sale::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
