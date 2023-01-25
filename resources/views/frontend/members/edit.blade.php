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
                            <label for="constituency_id">{{ trans('cruds.member.fields.constituency') }}</label>
                            
                            <input disabled class="form-control" type="text" name="name" id="name" value="{{$member->constituency->name}}">
                        </div>
                        <div class="form-group">
                            <label for="as_amount">{{ trans('cruds.member.fields.as_amount') }}</label>
                            <input class="form-control" type="number" name="as_amount" id="as_amount" value="{{ old('as_amount', $member->as_amount) }}" step="0.01">
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

        </div>
    </div>
</div>
@endsection