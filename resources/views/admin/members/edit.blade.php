@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.member.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.members.update", [$member->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.member.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="constituency">{{ trans('cruds.member.fields.constituency') }}</label>
                <input class="form-control {{ $errors->has('constituency') ? 'is-invalid' : '' }}" type="text" name="constituency" id="constituency" value="{{ old('constituency', $member->constituency) }}" required>
                @if($errors->has('constituency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('constituency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.constituency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="as_amount">{{ trans('cruds.member.fields.as_amount') }}</label>
                <input class="form-control {{ $errors->has('as_amount') ? 'is-invalid' : '' }}" type="number" name="as_amount" id="as_amount" value="{{ old('as_amount', $member->as_amount) }}" step="0.01" required>
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