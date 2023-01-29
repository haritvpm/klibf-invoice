@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.memberFund.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.member-funds.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="bookfest_id">{{ trans('cruds.memberFund.fields.bookfest') }}</label>
                            <select class="form-control select2" name="bookfest_id" id="bookfest_id" required>
                                @foreach($bookfests as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bookfest_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bookfest'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bookfest') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.memberFund.fields.bookfest_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="constituency_id">{{ trans('cruds.memberFund.fields.constituency') }}</label>
                            <select class="form-control select2" name="constituency_id" id="constituency_id" required>
                                @foreach($constituencies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('constituency_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('constituency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('constituency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.memberFund.fields.constituency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mla_id">{{ trans('cruds.memberFund.fields.mla') }}</label>
                            <select class="form-control select2" name="mla_id" id="mla_id" required>
                                @foreach($mlas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('mla_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mla'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mla') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.memberFund.fields.mla_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="as_amount">{{ trans('cruds.memberFund.fields.as_amount') }}</label>
                            <input class="form-control" type="number" name="as_amount" id="as_amount" value="{{ old('as_amount', '0') }}" step="0.01">
                            @if($errors->has('as_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('as_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.memberFund.fields.as_amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="as_amount_next">{{ trans('cruds.memberFund.fields.as_amount_next') }}</label>
                            <input class="form-control" type="number" name="as_amount_next" id="as_amount_next" value="{{ old('as_amount_next', '0') }}" step="0.01">
                            @if($errors->has('as_amount_next'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('as_amount_next') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.memberFund.fields.as_amount_next_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection