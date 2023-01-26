@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bookFest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.book-fests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bookFest.fields.id') }}
                        </th>
                        <td>
                            {{ $bookFest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookFest.fields.title') }}
                        </th>
                        <td>
                            {{ $bookFest->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookFest.fields.from') }}
                        </th>
                        <td>
                            {{ $bookFest->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookFest.fields.to') }}
                        </th>
                        <td>
                            {{ $bookFest->to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookFest.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\BookFest::STATUS_SELECT[$bookFest->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.book-fests.index') }}">
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
            <a class="nav-link" href="#bookfest_member_funds" role="tab" data-toggle="tab">
                {{ trans('cruds.memberFund.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="bookfest_member_funds">
            @includeIf('admin.bookFests.relationships.bookfestMemberFunds', ['memberFunds' => $bookFest->bookfestMemberFunds])
        </div>
    </div>
</div>

@endsection