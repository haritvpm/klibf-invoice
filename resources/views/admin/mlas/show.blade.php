@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mla.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mlas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mla.fields.id') }}
                        </th>
                        <td>
                            {{ $mla->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mla.fields.name') }}
                        </th>
                        <td>
                            {{ $mla->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mla.fields.name_mal') }}
                        </th>
                        <td>
                            {{ $mla->name_mal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mlas.index') }}">
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
            <a class="nav-link" href="#mla_member_funds" role="tab" data-toggle="tab">
                {{ trans('cruds.memberFund.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="mla_member_funds">
            @includeIf('admin.mlas.relationships.mlaMemberFunds', ['memberFunds' => $mla->mlaMemberFunds])
        </div>
    </div>
</div>

@endsection