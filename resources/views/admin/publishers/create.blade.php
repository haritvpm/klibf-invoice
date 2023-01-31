@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.publisher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.publishers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.publisher.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_no">{{ trans('cruds.publisher.fields.account_no') }}</label>
                <input class="form-control {{ $errors->has('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" id="account_no" value="{{ old('account_no', '') }}">
                @if($errors->has('account_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.account_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ifsc">{{ trans('cruds.publisher.fields.ifsc') }}</label>
                <input class="form-control {{ $errors->has('ifsc') ? 'is-invalid' : '' }}" type="text" name="ifsc" id="ifsc" value="{{ old('ifsc', '') }}">
                @if($errors->has('ifsc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ifsc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.ifsc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_name">{{ trans('cruds.publisher.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', '') }}">
                @if($errors->has('bank_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.bank_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.publisher.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gstin">{{ trans('cruds.publisher.fields.gstin') }}</label>
                <input class="form-control {{ $errors->has('gstin') ? 'is-invalid' : '' }}" type="text" name="gstin" id="gstin" value="{{ old('gstin', '') }}">
                @if($errors->has('gstin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gstin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.gstin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_person">{{ trans('cruds.publisher.fields.contact_person') }}</label>
                <input class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}" type="text" name="contact_person" id="contact_person" value="{{ old('contact_person', '') }}">
                @if($errors->has('contact_person'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_person') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.contact_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_email">{{ trans('cruds.publisher.fields.contact_email') }}</label>
                <input class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}">
                @if($errors->has('contact_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.contact_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_whatsapp">{{ trans('cruds.publisher.fields.contact_whatsapp') }}</label>
                <input class="form-control {{ $errors->has('contact_whatsapp') ? 'is-invalid' : '' }}" type="text" name="contact_whatsapp" id="contact_whatsapp" value="{{ old('contact_whatsapp', '') }}">
                @if($errors->has('contact_whatsapp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_whatsapp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.contact_whatsapp_helper') }}</span>
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