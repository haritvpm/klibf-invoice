@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.publisher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.publishers.update", [$publisher->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.publisher.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $publisher->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.publisher.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $publisher->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_no">{{ trans('cruds.publisher.fields.account_no') }}</label>
                <input class="form-control {{ $errors->has('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" id="account_no" value="{{ old('account_no', $publisher->account_no) }}">
                @if($errors->has('account_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.account_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ifsc">{{ trans('cruds.publisher.fields.ifsc') }}</label>
                <input class="form-control {{ $errors->has('ifsc') ? 'is-invalid' : '' }}" type="text" name="ifsc" id="ifsc" value="{{ old('ifsc', $publisher->ifsc) }}">
                @if($errors->has('ifsc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ifsc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.ifsc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_name">{{ trans('cruds.publisher.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $publisher->bank_name) }}">
                @if($errors->has('bank_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.bank_name_helper') }}</span>
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