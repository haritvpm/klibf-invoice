@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.member.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.members.update", [$member->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.member.fields.name') }}</label>
                            <input readonly class="form-control" type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="constituency">{{ trans('cruds.member.fields.constituency') }}</label>
                            <input readonly class="form-control" type="text" name="constituency" id="constituency" value="{{ old('constituency', $member->constituency) }}" required>
                            @if($errors->has('constituency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('constituency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.constituency_helper') }}</span>
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