@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.invoiceItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoice-items.update", [$invoiceItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="publisher_id">{{ trans('cruds.invoiceItem.fields.publisher') }}</label>
                <select class="form-control select2 {{ $errors->has('publisher') ? 'is-invalid' : '' }}" name="publisher_id" id="publisher_id" required>
                    @foreach($publishers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('publisher_id') ? old('publisher_id') : $invoiceItem->publisher->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('publisher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('publisher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceItem.fields.publisher_helper') }}</span>
            </div>
          
            <div class="form-group">
                <label class="required" for="bill_number">{{ trans('cruds.invoiceItem.fields.bill_number') }}</label>
                <input class="form-control {{ $errors->has('bill_number') ? 'is-invalid' : '' }}" type="text" name="bill_number" id="bill_number" value="{{ old('bill_number', $invoiceItem->bill_number) }}" required>
                @if($errors->has('bill_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bill_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceItem.fields.bill_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bill_date">{{ trans('cruds.invoiceItem.fields.bill_date') }}</label>
                <input class="form-control date {{ $errors->has('bill_date') ? 'is-invalid' : '' }}" type="text" name="bill_date" id="bill_date" value="{{ old('bill_date', $invoiceItem->bill_date) }}" required>
                @if($errors->has('bill_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bill_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceItem.fields.bill_date_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="gross">{{ trans('cruds.invoiceItem.fields.gross') }}</label>
                <input class="form-control {{ $errors->has('gross') ? 'is-invalid' : '' }}" type="number" name="gross" id="gross" value="{{ old('gross', $invoiceItem->gross) }}" step="0.01">
                @if($errors->has('gross'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gross') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceItem.fields.gross_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.invoiceItem.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', $invoiceItem->discount) }}" step="0.01">
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceItem.fields.discount_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.invoiceItem.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $invoiceItem->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceItem.fields.amount_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="invoice_list_id">{{ trans('cruds.invoiceItem.fields.invoice_list') }}</label>
                <input type="hidden" name="invoice_list_id" value= {{ $invoiceItem->invoice_list->id }} >

                <select class="form-control  {{ $errors->has('invoice_list') ? 'is-invalid' : '' }}" name="invoice_list_id" id="invoice_list_id" required>
                    @foreach($invoice_lists as $id => $entry)
                        <option disabled value="{{ $id }}" {{ (old('invoice_list_id') ? old('invoice_list_id') : $invoiceItem->invoice_list->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice_list'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_list') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceItem.fields.invoice_list_helper') }}</span>
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