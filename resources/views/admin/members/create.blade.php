@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.member.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.members.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.member.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bookfest_id">{{ trans('cruds.member.fields.bookfest') }}</label>
                <select class="form-control select2 {{ $errors->has('bookfest') ? 'is-invalid' : '' }}" name="bookfest_id" id="bookfest_id">
                    @foreach($bookfests as $id => $entry)
                        <option value="{{ $id }}" {{ old('bookfest_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bookfest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bookfest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.bookfest_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="constituency_id">{{ trans('cruds.member.fields.constituency') }}</label>
                <select class="form-control select2 {{ $errors->has('constituency') ? 'is-invalid' : '' }}" name="constituency_id" id="constituency_id">
                    @foreach($constituencies as $id => $entry)
                        <option value="{{ $id }}" {{ old('constituency_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('constituency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('constituency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.constituency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="as_amount">{{ trans('cruds.member.fields.as_amount') }}</label>
                <input class="form-control {{ $errors->has('as_amount') ? 'is-invalid' : '' }}" type="number" name="as_amount" id="as_amount" value="{{ old('as_amount', '') }}" step="0.01">
                @if($errors->has('as_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('as_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.as_amount_helper') }}</span>
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