@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoiceList.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.invoice-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceList.fields.id') }}
                        </th>
                        <td>
                            {{ $invoiceList->id }}
                        </td>
                    </tr>
                    <!-- <tr>
                        <th>
                            {{ trans('cruds.invoiceList.fields.number') }}
                        </th>
                        <td>
                            {{ $invoiceList->number }}
                        </td>
                    </tr> -->
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceList.fields.institution_type') }}
                        </th>
                        <td>
                            {{ App\Models\InvoiceList::INSTITUTION_TYPE_RADIO[$invoiceList->institution_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceList.fields.institution_name') }}
                        </th>
                        <td>
                            {{ $invoiceList->institution_name }}
                        </td>
                    </tr>
                   <!--  <tr>
                        <th>
                            {{ trans('cruds.invoiceList.fields.amount_allotted') }}
                        </th>
                        <td>
                            {{ $invoiceList->amount_allotted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceList.fields.remarks') }}
                        </th>
                        <td>
                            {{ $invoiceList->remarks }}
                        </td>
                    </tr> -->
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceList.fields.member') }}
                        </th>
                        <td>
                            {{ $invoiceList->member->name ?? '' }}, 
                            {{ $invoiceList->member->constituency ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
           <!--  <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.invoice-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> -->
        </div>
    </div>
</div>

@can('invoice_item_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('frontend.invoice-items.create', ['list-id'=>$invoiceList]) }}">
                {{ trans('global.add') }} {{ trans('cruds.invoiceItem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
    
 @includeIf('frontend.invoiceLists.relationships.invoiceListInvoiceItems', ['invoiceItems' => $invoiceList->invoiceListInvoiceItems])
     


 </div>
    </div>
</div>
@endsection