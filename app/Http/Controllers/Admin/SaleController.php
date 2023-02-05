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
use App\Models\SaleItem;
use App\Exports\StallsExport;
//use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$bookfest = BookFest::where('status', 'active')->latest()->first();
        $sales = Sale::with(['bookfest', 'publisher', 'invoiceNumberSaleItemsNonZero'])->get();
        
        $product_ids = DB::table('book_fest_product')
        //->where( 'book_fest_id',$bookfest?->id )
        ->pluck('product_id');
        $products = Product::whereIn('id', $product_ids)->orderby('id')->get();

        return view('admin.sales.index', compact('sales', 'products'));
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
       // dd($request->all());

        $requestData = collect($request->only('product_id', 'quantity'))
                        ->transpose(['product_id', 'quantity']);


            //check dates
            $bookfest = BookFest::where('status', 'active')->latest()->first();


            if(!$bookfest){
                return  back()->withInput()->withErrors(['No active bookfest found']);;
            }

            $invoice_number = Sale::where('bookfest_id', $bookfest->id)->max('invoice_number')+1;

            //dd($bookfest->id);
            $sale = Sale::create($request->only( 'publisher_id', 'invoice_date','invoice_number', 'payment', 'remarks' )
                                + [ 'bookfest_id' => $bookfest->id, 
                                  'invoice_number' =>  $invoice_number,
                                  ] );

            $items = [];
            foreach ($requestData as $item) {
                $items[] = new SaleItem([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
               
                ]);
            }

            $sale->invoiceNumberSaleItems()->saveMany($items);



        return redirect()->route('admin.sales.index')
               ->with('message','Sale created successfully. ' . 'Invoice No: ' . $sale->invoice_number);

   
    }

    public function edit(Sale $sale)
    {
        abort_if(Gate::denies('sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sale->load('bookfest', 'publisher','invoiceNumberSaleItems');

        return view('admin.sales.edit', compact( 'publishers', 'sale'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {


        $requestData = collect($request->only('product_id', 'quantity'))
                        ->transpose(['product_id', 'quantity']);


        //dd($bookfest->id);
        $sale->update($request->only( 'publisher_id', 'invoice_number', 'invoice_date', 'payment', 'remarks' )  );
        $sale->invoiceNumberSaleItems()->delete();
        $items = [];
        foreach ($requestData as $item) {
            $items[] = new SaleItem([
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            
            ]);
        }

        $sale->invoiceNumberSaleItems()->saveMany($items);

        return redirect()->route('admin.sales.index')
        ->with('message','Sale updated successfully. ' . 'ID: ' . $sale->id);
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
        $sale->invoiceNumberSaleItems()->delete();

        $sale->delete();

        return back();
    }

    public function massDestroy(MassDestroySaleRequest $request)
    {
        Sale::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function export() 
    {
        $bookfest = BookFest::where('status', 'active')->latest()->first();
        if(!$bookfest){
            return  back()->withErrors(['No active bookfest found']);;
        }

        $product_ids = DB::table('book_fest_product')->where( 'book_fest_id',$bookfest?->id )->pluck('product_id');
        $products = Product::whereIn('id', $product_ids)->orderby('id')->get();

       // return Excel::download(new MembersExport, 'klibf.xlsx');
        return (new StallsExport($bookfest->id, $products))->download('klibf' . $bookfest->title . '_stalls.xlsx');
    }
}
