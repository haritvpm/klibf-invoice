@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="bookfests">{{ trans('cruds.product.fields.bookfest') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('bookfests') ? 'is-invalid' : '' }}" name="bookfests[]" id="bookfests" multiple>
                    @foreach($bookfests as $id => $bookfest)
                        <option value="{{ $id }}" {{ (in_array($id, old('bookfests', [])) || $product->bookfests->contains($id)) ? 'selected' : '' }}>{{ $bookfest }}</option>
                    @endforeach
                </select>
                @if($errors->has('bookfests'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bookfests') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.bookfest_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $product->description) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hsn">{{ trans('cruds.product.fields.hsn') }}</label>
                <input class="form-control {{ $errors->has('hsn') ? 'is-invalid' : '' }}" type="text" name="hsn" id="hsn" value="{{ old('hsn', $product->hsn) }}">
                @if($errors->has('hsn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hsn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.hsn_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.product.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="taxpercent_cgst">{{ trans('cruds.product.fields.taxpercent_cgst') }}</label>
                <input class="form-control {{ $errors->has('taxpercent_cgst') ? 'is-invalid' : '' }}" type="number" name="taxpercent_cgst" id="taxpercent_cgst" value="{{ old('taxpercent_cgst', $product->taxpercent_cgst) }}" step="0.01">
                @if($errors->has('taxpercent_cgst'))
                    <div class="invalid-feedback">
                        {{ $errors->first('taxpercent_cgst') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.taxpercent_cgst_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="taxpercent_sgst">{{ trans('cruds.product.fields.taxpercent_sgst') }}</label>
                <input class="form-control {{ $errors->has('taxpercent_sgst') ? 'is-invalid' : '' }}" type="number" name="taxpercent_sgst" id="taxpercent_sgst" value="{{ old('taxpercent_sgst', $product->taxpercent_sgst) }}" step="0.01">
                @if($errors->has('taxpercent_sgst'))
                    <div class="invalid-feedback">
                        {{ $errors->first('taxpercent_sgst') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.taxpercent_sgst_helper') }}</span>
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