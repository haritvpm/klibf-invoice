@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.invoiceList.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("frontend.invoice-lists.update", [$invoiceList->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="number">{{ trans('cruds.invoiceList.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', $invoiceList->number) }}" step="1">
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.invoiceList.fields.institution_type') }}</label>
                @foreach(App\Models\InvoiceList::INSTITUTION_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('institution_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="institution_type_{{ $key }}" name="institution_type" value="{{ $key }}" {{ old('institution_type', $invoiceList->institution_type) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="institution_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('institution_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institution_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.institution_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="institution_name">{{ trans('cruds.invoiceList.fields.institution_name') }}</label>
                <input class="form-control {{ $errors->has('institution_name') ? 'is-invalid' : '' }}" type="text" name="institution_name" id="institution_name" value="{{ old('institution_name', $invoiceList->institution_name) }}" required>
                @if($errors->has('institution_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institution_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.institution_name_helper') }}</span>
            </div>
           <!--  <div class="form-group">
                <label for="amount_allotted">{{ trans('cruds.invoiceList.fields.amount_allotted') }}</label>
                <input class="form-control {{ $errors->has('amount_allotted') ? 'is-invalid' : '' }}" type="number" name="amount_allotted" id="amount_allotted" value="{{ old('amount_allotted', $invoiceList->amount_allotted) }}" step="0.01">
                @if($errors->has('amount_allotted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_allotted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.amount_allotted_helper') }}</span>
            </div> -->
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.invoiceList.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $invoiceList->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="member_id">{{ trans('cruds.invoiceList.fields.member') }}</label>
                <select class="form-control select2 {{ $errors->has('member') ? 'is-invalid' : '' }}" name="member_id" id="member_id" required>
                    @foreach($members as $id => $entry)
                        <option value="{{ $id }}" {{ (old('member_id') ? old('member_id') : $invoiceList->member->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('member'))
                    <div class="invalid-feedback">
                        {{ $errors->first('member') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.member_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@includeIf('frontend.invoiceLists.relationships.invoiceListInvoiceItems', ['invoiceItems' => $invoiceList->invoiceListInvoiceItems])

</div>
    </div>
</div>

@endsection