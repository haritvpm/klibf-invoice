@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.sanctionedAmount.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sanctioned-amounts.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="member_id">{{ trans('cruds.sanctionedAmount.fields.member') }}</label>
                            <select class="form-control" name="member_id" id="member_id" required>
                                @foreach($members as $id => $entry)
                                    <option value="{{ $id }}" {{ old('member_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('member'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('member') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sanctionedAmount.fields.member_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fin_year_id">{{ trans('cruds.sanctionedAmount.fields.fin_year') }}</label>
                            <select class="form-control" name="fin_year_id" id="fin_year_id" required>
                                @foreach($fin_years as $id => $entry)
                                    <option value="{{ $id }}" {{ old('fin_year_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fin_year'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fin_year') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sanctionedAmount.fields.fin_year_helper') }}</span>
                        </div>
                
                        <div class="form-group">
                            <label class="required" for="as_amount">{{ trans('cruds.sanctionedAmount.fields.as_amount') }}</label>
                            <input class="form-control" type="number" name="as_amount" id="as_amount" value="{{ old('as_amount', '') }}" step="0.01" required>
                            @if($errors->has('as_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('as_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sanctionedAmount.fields.as_amount_helper') }}</span>
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