@extends('layouts.frontend')
@section('content')

<style>

/* .select2-search { background-color: #00f; } */
/* .select2-search input { background-color: #00f; } */
.select2-results { background-color: #DAF7A6; }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.invoiceList.title_singular') }}
    </div>

    <div class="card-body ">
        <form method="POST" action="{{ route("frontend.invoice-lists.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
          <!--   <div class="form-group col-md-2">
                <label for="number">{{ trans('cruds.invoiceList.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '') }}" step="1">
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.number_helper') }}</span>
            </div> -->
            <div class="form-group col-md-3">
                <label class="required">{{ trans('cruds.invoiceList.fields.institution_type') }}</label>
                @foreach(App\Models\InvoiceList::INSTITUTION_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('institution_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="institution_type_{{ $key }}" name="institution_type" value="{{ $key }}" {{ old('institution_type', '') === (string) $key ? 'checked' : '' }} required>
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
         

            <div class="form-group col-md-7">
                <label class="required" for="institution_name">{{ trans('cruds.invoiceList.fields.institution_name') }}</label>
                <input class="form-control {{ $errors->has('institution_name') ? 'is-invalid' : '' }}" type="text" name="institution_name" id="institution_name" value="{{ old('institution_name', '') }}" required>
                @if($errors->has('institution_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institution_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.institution_name_helper') }}</span>
            </div>
            </div>
           <!--  <div class="form-group">
                <label for="amount_allotted">{{ trans('cruds.invoiceList.fields.amount_allotted') }}</label>
                <input class="form-control {{ $errors->has('amount_allotted') ? 'is-invalid' : '' }}" type="number" name="amount_allotted" id="amount_allotted" value="{{ old('amount_allotted', '') }}" step="0.01">
                @if($errors->has('amount_allotted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_allotted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.amount_allotted_helper') }}</span>
            </div> -->
          
            <div class="form-group">
                <label class="required" for="member_id">{{ trans('cruds.invoiceList.fields.member') }}</label>
                <select data-live-search="true" class="form-control select2 {{ $errors->has('member') ? 'is-invalid' : '' }}" name="member_id" id="member_id" required>
                    @foreach($members as $id => $entry)
                        <option value="{{ $id }}" {{ old('member_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('member'))
                    <div class="invalid-feedback">
                        {{ $errors->first('member') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.member_helper') }}</span>
            </div>
           

    <table class="table table-bordered">
    <thead>
       <tr>
           <th scope="col">Publisher</th>
           <th scope="col">Bill No</th>
           <th scope="col">Bill Date</th>
           <th scope="col">Amount</th>
           <th scope="col">
      
           <!-- <a class="addRow"><i class="fa fa-plus"></i></a> -->
        </th>
         </tr>
       </thead>
       <tbody>
           <tr>
             <td>
                
                 <select data-live-search="true" class="form-control publisher " 
                 name="publisher_id[]"  required>
                    @foreach($publishers as $id => $entry)
                        <option value="{{ $id }}" {{ old('publisher_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                      
                    
            </td>


            <td>
            <input class="form-control bill-number {{ $errors->has('bill_number') ? 'is-invalid' : '' }}" type="text" 
            name="bill_number[]"  value="{{ old('bill_number[]', '') }}" required autocomplete="off">

            </td>

            <td>
            <input class="form-control bill-date  {{ $errors->has('bill_date') ? 'is-invalid' : '' }}" type="text" 
            name="bill_date[]"  value="{{ old('bill_date[]') }}" required>
           
            </td>
          
          
           <td><input  class="form-control amount"  type="text" name="amount[]" required autocomplete="off"></td>
        
        <!-- <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa fa-remove"></i></button></td> -->
         </tr>
       </tbody>
       <tfoot>
        <tr>
         <td>     <button type="button"  class="btn btn-sm btn-primary addRow"><i class="fa fa-plus"></i></button> </td>
         <td></td>
        
         <td><b class="total-label">Total</b></td>
         <td><b class="total"></b></td>
         <td></td>
        </tr>
       </tfoot>

    </table>

           <!--  
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.invoiceList.fields.remarks') }}</label>
                <textarea rows="2" class="form-control form-control-sm {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.remarks_helper') }}</span>
            </div> -->
<div class='mt-5'></div>
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

@section('scripts')
@parent

<script type="text/javascript">
    $(document).ready(function(){
        var i=1;  


     

        $('tbody').delegate('.publisher', 'change', function () {
            var  tr = $(this).parent().parent();
            tr.find('.bill-number').focus();
        })
        $('tbody').delegate('.publisher', 'change', function () {
           
        });
       
        $('tbody').delegate('.bill-date', 'keyup', function () {
           if($(this).val() == 9){
                $(this).val('09/01/2023')
                var  tr = $(this).parent().parent();
                tr.find('.amount').focus();
           }
           else  if($(this).val() >= 10 && $(this).val() <= 17) {
                $(this).val( $(this).val() + '/01/2023')
                var  tr = $(this).parent().parent();

                tr.find('.amount').focus();
           }
        });

        $('tbody').delegate('.amount', 'keyup', function () {
         
            total();
           
        });

        function total(){
            let total = 0;
            let items = 0;
            $('.amount').each(function (i,e) {
                var amount =$(this).val()-0;
                total += amount;
                items++;
            })

            $('.total').html(total);
            $('.total-label').html('Total (' + items + ')' );
        }
       
        $('.addRow').on('click', function () {
            addRow();
            total();
        });

        function addRow() {
            i++;  
            var addRow = ' <tr id="row'+i+'" class="dynamic-added">\n' +
'             <td>\n' +
'                \n' +
'                 <select class="form-control publisher  " \n' +
'                 name="publisher_id[]"  required>\n' +
'                    @foreach($publishers as $id => $entry)\n' +
'                        <option value="{{ $id }}" {{ old('publisher_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>\n' +
'                    @endforeach\n' +
'                </select>\n' +
'                      \n' +
'                    \n' +
'            </td>\n' +
'\n' +
'            <td>\n' +
'            <input class="form-control bill-number" type="text" name="bill_number[]"  value="{{ old('bill_number[]', '') }}" required autocomplete="off">\n' +
'\n' +
'            </td>\n' +
'\n' +
'            <td>\n' +
'            <input class="form-control bill-date " type="text" name="bill_date[]" value="{{ old('bill_date[]') }}" required>\n' +
'\n' +
'            \n' +
'            </td>\n' +
'           <td><input type="text" name="amount[]" class="form-control amount" required autocomplete="off"></td>\n' +
'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove"><i class="fa fa-remove"></i></button></td>\n' +
'         </tr>\n' ;
            $('tbody').append(addRow);
        };
       
       /*  $('.remove').live('click', function () {
            var l =$('tbody tr').length;
            if(l==1){
                alert('you cant delete last one')
            }else{
                $(this).parent().parent().remove();
            }
        }); */

        $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
           total();
      });  

    });
</script>
@endsection