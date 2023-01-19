@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoiceItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <!-- <a class="btn btn-default" href="{{ route('frontend.invoice-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a> -->
                <a class="btn btn-default"  href="{{ route('frontend.invoice-lists.show', [$invoiceItem->invoice_list->id]) }}"> {{ trans('global.back_to_list') }} </a>

            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.id') }}
                        </th>
                        <td>
                            {{ $invoiceItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.publisher') }}
                        </th>
                        <td>
                            {{ $invoiceItem->publisher->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.amount') }}
                        </th>
                        <td>
                            {{ $invoiceItem->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.bill_number') }}
                        </th>
                        <td>
                            {{ $invoiceItem->bill_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.bill_date') }}
                        </th>
                        <td>
                            {{ $invoiceItem->bill_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.invoice_list') }}
                        </th>
                        <td>
                            {{ $invoiceItem->invoice_list->institution_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.invoice-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> -->
        </div>
    </div>
</div>



</div>
    </div>
</div>
@endsection