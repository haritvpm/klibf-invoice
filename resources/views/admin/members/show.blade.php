@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.member.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.id') }}
                        </th>
                        <td>
                            {{ $member->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.name') }}
                        </th>
                        <td>
                            {{ $member->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.constituency') }}
                        </th>
                        <td>
                            {{ $member->constituency }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
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
            <a class="nav-link" href="#member_invoice_lists" role="tab" data-toggle="tab">
                {{ trans('cruds.invoiceList.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#member_sanctioned_amounts" role="tab" data-toggle="tab">
                {{ trans('cruds.sanctionedAmount.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="member_invoice_lists">
            @includeIf('admin.members.relationships.memberInvoiceLists', ['invoiceLists' => $member->memberInvoiceLists])
        </div>
        <div class="tab-pane" role="tabpanel" id="member_sanctioned_amounts">
            @includeIf('admin.members.relationships.memberSanctionedAmounts', ['sanctionedAmounts' => $member->memberSanctionedAmounts])
        </div>
    </div>
</div>

@endsection