@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.publisher.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.publishers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.publisher.fields.id') }}
                        </th>
                        <td>
                            {{ $publisher->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publisher.fields.name') }}
                        </th>
                        <td>
                            {{ $publisher->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.publishers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#publisher_invoice_items" role="tab" data-toggle="tab">
                {{ trans('cruds.invoiceItem.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="publisher_invoice_items">
            @includeIf('admin.publishers.relationships.publisherInvoiceItems', ['invoiceItems' => $publisher->publisherInvoiceItems])
        </div>
    </div>
</div>

@endsection