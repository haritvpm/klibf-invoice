@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales.update", [$sale->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
     <!--        <div class="form-group">
                <label for="bookfest_id">{{ trans('cruds.sale.fields.bookfest') }}</label>
                <select class="form-control select2 {{ $errors->has('bookfest') ? 'is-invalid' : '' }}" name="bookfest_id" id="bookfest_id">
                    @foreach($bookfests as $id => $entry)
                        <option value="{{ $id }}" {{ (old('bookfest_id') ? old('bookfest_id') : $sale->bookfest->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bookfest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bookfest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.bookfest_helper') }}</span>
            </div> -->
            <div class="form-group">
                <label class="required" for="publisher_id">{{ trans('cruds.sale.fields.publisher') }}</label>
                <select class="form-control select2 {{ $errors->has('publisher') ? 'is-invalid' : '' }}" name="publisher_id" id="publisher_id" required>
                    @foreach($publishers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('publisher_id') ? old('publisher_id') : $sale->publisher->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('publisher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('publisher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.publisher_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_date">{{ trans('cruds.sale.fields.invoice_date') }}</label>
                <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $sale->invoice_date) }}">
                @if($errors->has('invoice_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.invoice_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.sale.fields.payment') }}</label>
                <select class="form-control {{ $errors->has('payment') ? 'is-invalid' : '' }}" name="payment" id="payment">
                    <option value disabled {{ old('payment', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Sale::PAYMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment', $sale->payment) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.sale.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', $sale->remarks) }}">
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.remarks_helper') }}</span>
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