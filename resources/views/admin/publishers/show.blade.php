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


     @includeIf('admin.publishers.relationships.publisherInvoiceItems', ['invoiceItems' => $publisher->publisherInvoiceItems])

@endsection