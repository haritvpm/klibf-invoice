@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sale.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-border">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.id') }}
                        </th>
                        <td>
                            {{ $sale->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.bookfest') }}
                        </th>
                        <td>
                            {{ $sale->bookfest->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.publisher') }}
                        </th>
                        <td>
                            {{ $sale->publisher->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $sale->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $sale->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.payment') }}
                        </th>
                        <td>
                            {{ App\Models\Sale::PAYMENT_SELECT[$sale->payment] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.remarks') }}
                        </th>
                        <td>
                            {{ $sale->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>


        <table class="table table-border mt-3">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        
                        <th scope="col">Item</th>
                        <th scope="col">Qty</th>


                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($sale->invoiceNumberSaleItems as $saleitem)

                    <tr id="rowinitial-{{$loop->index}}" >
                        <td>
                            <div class="slno mt-1">{{$loop->index+1}}</div>
                        </td>
                        
                        <td >
                            {{$saleitem->product->name}}
                            </td>
                        <td  class="w-5"> {{ $saleitem->quantity }}  </td>

                      

                    </tr>
                    @endforeach

                </tbody>
                           

            </table>

    </div>
</div>

<!-- <div class="card">
@includeIf('admin.sales.relationships.invoiceNumberSaleItems', ['saleItems' => $sale->invoiceNumberSaleItems])
</div> -->

@endsection