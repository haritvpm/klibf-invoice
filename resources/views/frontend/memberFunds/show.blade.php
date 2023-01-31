@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.memberFund.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.member-funds.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $memberFund->id }}
                                    </td>
                                </tr>
                               <!--  <tr>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.bookfest') }}
                                    </th>
                                    <td>
                                        {{ $memberFund->bookfest->title ?? '' }}
                                    </td>
                                </tr> -->
                                <tr>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.constituency') }}
                                    </th>
                                    <td>
                                        {{ $memberFund->constituency->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.mla') }}
                                    </th>
                                    <td>
                                        {{ $memberFund->mla->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.as_amount') }}
                                    </th>
                                    <td>
                                        {{ $memberFund->as_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.as_amount_prev') }}
                                    </th>
                                    <td>
                                        {{ $memberFund->as_amount_prev }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.as_amount_next') }}
                                    </th>
                                    <td>
                                        {{ $memberFund->as_amount_next }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.member-funds.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection