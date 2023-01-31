@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales.store") }}" enctype="multipart/form-data">
            @csrf
          
            <div class="form-group">
                <label class="required" for="publisher_id">{{ trans('cruds.sale.fields.publisher') }}</label>
                <select class="form-control select2 {{ $errors->has('publisher') ? 'is-invalid' : '' }}" name="publisher_id" id="publisher_id" required>
                    @foreach($publishers as $id => $entry)
                        <option value="{{ $id }}" {{ old('publisher_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', date('d/m/Y')) }}">
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
                        <option value="{{ $key }}" {{ old('payment', 'proposal') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', '') }}">
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.remarks_helper') }}</span>
            </div>

            <table class="table table-borderless  mt-3">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        
                        <th scope="col">Item</th>
                        <th scope="col">Qty</th>


                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($products as $product)

                    <tr id="rowinitial-{{$loop->index}}" >
                        <td>
                            <div class="slno mt-1">{{$loop->index+1}}</div>
                        </td>
                        
                        <td >
                            <span class="mt-1 ">{{$product->name}}</span> 
                            <input class="form-control product" type="hidden"  name="$product_id[]" value="{{$product->id}}" autocomplete="off">
                            </td>
                        <td  class="w-5"><input class="form-control qty" type="text" inputmode="numeric" pattern="[0-9]*" name="qty[]" value="{{ old('qty.'.$loop->index,0)}}" required autocomplete="off"></td>

                      

                    </tr>
                    @endforeach

                </tbody>
                           

            </table>
              <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>


@endsection

@section('scripts')
@parent
<script type="text/javascript">
    $(document).ready(function() {
       
        $('select').select2({  theme: 'bootstrap-5',});

    });

</script>

@endsection