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
                <label class="required" for="constituency">{{ trans('cruds.member.fields.constituency') }}</label>
                <input class="form-control {{ $errors->has('constituency') ? 'is-invalid' : '' }}" type="text" name="constituency" id="constituency" value="{{ old('constituency', '') }}" required>
                @if($errors->has('constituency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('constituency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.constituency_helper') }}</span>
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
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection