@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.sanctionedAmount.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sanctioned-amounts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $sanctionedAmount->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.as_amount') }}
                                    </th>
                                    <td>
                                        {{ $sanctionedAmount->as_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.fin_year') }}
                                    </th>
                                    <td>
                                        {{ $sanctionedAmount->fin_year->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.member') }}
                                    </th>
                                    <td>
                                        {{ $sanctionedAmount->member->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.book_fest') }}
                                    </th>
                                    <td>
                                        {{ $sanctionedAmount->book_fest->title ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sanctioned-amounts.index') }}">
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