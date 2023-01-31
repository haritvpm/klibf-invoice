@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.saleItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sale-items.update", [$saleItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.saleItem.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $saleItem->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.saleItem.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_number_id">{{ trans('cruds.saleItem.fields.invoice_number') }}</label>
                <select class="form-control select2 {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" name="invoice_number_id" id="invoice_number_id">
                    @foreach($invoice_numbers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('invoice_number_id') ? old('invoice_number_id') : $saleItem->invoice_number->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.saleItem.fields.invoice_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.saleItem.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $saleItem->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.saleItem.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.saleItem.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', $saleItem->discount) }}" step="0.01">
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.saleItem.fields.discount_helper') }}</span>
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