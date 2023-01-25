@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sanctionedAmount.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sanctioned-amounts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="as_amount">{{ trans('cruds.sanctionedAmount.fields.as_amount') }}</label>
                <input class="form-control {{ $errors->has('as_amount') ? 'is-invalid' : '' }}" type="number" name="as_amount" id="as_amount" value="{{ old('as_amount', '') }}" step="0.01" required>
                @if($errors->has('as_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('as_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sanctionedAmount.fields.as_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fin_year_id">{{ trans('cruds.sanctionedAmount.fields.fin_year') }}</label>
                <select class="form-control select2 {{ $errors->has('fin_year') ? 'is-invalid' : '' }}" name="fin_year_id" id="fin_year_id" required>
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
                <label class="required" for="member_id">{{ trans('cruds.sanctionedAmount.fields.member') }}</label>
                <select class="form-control select2 {{ $errors->has('member') ? 'is-invalid' : '' }}" name="member_id" id="member_id" required>
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
                <label class="required" for="book_fest_id">{{ trans('cruds.sanctionedAmount.fields.book_fest') }}</label>
                <select class="form-control select2 {{ $errors->has('book_fest') ? 'is-invalid' : '' }}" name="book_fest_id" id="book_fest_id" required>
                    @foreach($book_fests as $id => $entry)
                        <option value="{{ $id }}" {{ old('book_fest_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('book_fest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('book_fest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sanctionedAmount.fields.book_fest_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection