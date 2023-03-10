@extends('layouts.frontend')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.invoiceList.title_singular') }} # {{$invoiceList->id}}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.invoice-lists.update", [$invoiceList->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <!--  <div class="form-group">
                <label for="number">{{ trans('cruds.invoiceList.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', $invoiceList->number) }}" step="1">
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.number_helper') }}</span>
            </div> -->
                        <div class="form-group">
                            <!-- <label class="required" for="member_id">{{ trans('cruds.invoiceList.fields.member') }}</label> -->
                            <select data-live-search="true" class="form-control select2 " name="member_fund_id" id="member_fund_id" required>
                                @foreach($member_funds as $id => $entry)
                                <option value="{{ $id }}" {{ (old('member_fund_id') ? old('member_fund_id') : $invoiceList->member_fund->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('member'))
                            <div class="invalid-feedback">
                                {{ $errors->first('member') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoiceList.fields.member_helper') }}</span>
                        </div>
                        <div class="row   mt-3">

                            <div class="form-group col-md-3">
                                <!-- <label class="required">{{ trans('cruds.invoiceList.fields.institution_type') }}</label> -->
                                @foreach(App\Models\InvoiceList::INSTITUTION_TYPE_RADIO as $key => $label)
                                <div class="form-check  mt-1  {{ $errors->has('institution_type') ? 'is-invalid' : '' }}">
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


                            <div class="form-group col-md-9">
                                <label class="required" for="institution_name">{{ trans('cruds.invoiceList.fields.institution_name') }}</label>
                                <input class="form-control {{ $errors->has('institution_name') ? 'is-invalid' : '' }}" type="text" name="institution_name" id="institution_name" value="{{ old('institution_name', $invoiceList->institution_name) }}" required>
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
                <input class="form-control {{ $errors->has('amount_allotted') ? 'is-invalid' : '' }}" type="number" name="amount_allotted" id="amount_allotted" value="{{ old('amount_allotted', $invoiceList->amount_allotted) }}" step="0.01">
                @if($errors->has('amount_allotted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_allotted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.amount_allotted_helper') }}</span>
            </div> -->
                        <!--   <div class="form-group">
                <label for="remarks">{{ trans('cruds.invoiceList.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $invoiceList->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoiceList.fields.remarks_helper') }}</span>
            </div> -->

                        <table class="table table-bordered   mt-3">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="w-25">Publisher</th>
                                    <th scope="col">Bill No</th>
                                    <th scope="col">Bill Date</th>
                                    <th scope="col">Gross</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($invoiceList->invoiceListInvoiceItems as $key => $invoiceItem)
                                <tr id="rowinitial-{{$loop->index}}" class="dynamic-added">
                                    <td>
                                        <div class="slno mt-1"></div>
                                    </td>
                                    <td>

                                        <select data-live-search="true" class="form-control publisher select2" name="publisher_id[]" required>
                                            @foreach($publishers as $id => $entry)
                                            <option value="{{ $id }}" {{ $invoiceItem->publisher_id == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                            @endforeach
                                        </select>


                                    </td>


                                    <td>
                                        <input class="form-control bill-number" type="text" name="bill_number[]" value="{{$invoiceItem->bill_number }}" required autocomplete="off">

                                    </td>

                                    <td>
                                        <input class="form-control bill-date" type="text" name="bill_date[]" value="{{$invoiceItem->bill_date }}" required pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$">

                                    </td>


                                    <td><input class="form-control gross" type="text" inputmode="numeric" pattern="[0-9]*" name="gross[]" value="{{ number_format($invoiceItem->gross,0,'.','') }}" required autocomplete="off"></td>
                                    <td><input class="form-control discount" type="text" inputmode="numeric" pattern="[0-9]*" name="discount[]" value="{{number_format($invoiceItem->discount,0,'.','') }}" required autocomplete="off"></td>

                                    <td><input class="form-control amount" type="text" inputmode="numeric" pattern="[0-9]*" name="amount[]" value="{{number_format($invoiceItem->amount,0,'.','') }}" required autocomplete="off"></td>

                                    @if ($loop->first)
                                    <td></td>
                                    @else
                                    <td><button type="button" name="remove" id="initial-{{$loop->index}}" class="btn btn-sm btn-danger btn_remove"><i class="fa fa-trash"></i></button></td>
                                    @endif

                                </tr>
                                @endforeach
                                <!--  -->

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="5"> <button type="button" class="btn btn-sm btn-primary addRow"><i class="fa fa-plus"></i></button> </td>

                                    <td><b class="total-label">Total</b></td>
                                    <td><b class="total"></b></td>
                                    <td></td>
                                </tr>
                            </tfoot>

                        </table>


                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.update') }}
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
    $(document).ready(function() {
        var i = 1;
        var dates = {!! json_encode($dates) !!};
        $('select').select2({  theme: 'bootstrap-5',});

        total();

        $('tbody').delegate('.bill-date', 'keyup', function() {
           
          /*  if ($(this).val() >= 9 && $(this).val() <= 15) {
               let d = $(this).val().toString();
               if (d.length === 1) d = "0" + d;
               $(this).val( d + '/01/2023')
               var tr = $(this).parent().parent();

               tr.find('.gross').focus();
           }  */
           for (const key in dates) {
                //need atleast two digits or if it is from 1 to 10,
                //we will not be able to type 10
                if ( $(this).val() == key) {
                    
                    $(this).val( dates[key])
                    var tr = $(this).parent().parent();
                    tr.find('.gross').focus();
                    break;
              } 
            }
       });

        $('tbody').delegate('.publisher', 'change', function() {
            var tr = $(this).closest('tr')
           //var tr = $(this).parent().parent();
           setTimeout(() => {
            tr.find('.bill-number').focus();
            
           }, 100);
        })
      

        $('tbody').delegate('.amount', 'change', function() {

            var tr = $(this).parent().parent();
            var g = parseInt(tr.find('.gross').val());
            var a = parseInt($(this).val())
            if( g >= a )  {
                tr.find('.discount').val( g - a );
            }else{
                tr.find('.discount').val( '' );

            }

            total();

        });


        $('tbody').delegate('.gross, .discount', 'change', function() {
            var tr = $(this).parent().parent();
            var g = parseInt(tr.find('.gross').val());
            var d = parseInt(tr.find('.discount').val());
            if( g >= d )  {
                tr.find('.amount').val( g - d );
            }else{
                tr.find('.amount').val( '' );

            }
            total();
        })

        function total() {
            let total = 0;
            let items = 0;
            $('.amount').each(function(i, e) {
                var amount = $(this).val() - 0;
                total += amount;
                items++;
            })

            $('.total').html(total);
            $('.total-label').html('Total (' + items + ')');

            //slno
            $('.slno').each(function(i, e) {

                $(this).text(i + 1);
            })
        }

        $('.addRow').on('click', function() {
            addRow();
            total();
        });

        function addRow() {
            i++;
            var addRow = ' <tr id="row' + i + '" class="dynamic-added">\n' +
                '<td > <div class="slno  mt-1" ></div> </td>\n' +
                '             <td>\n' +
                '                \n' +
                '                 <select class="form-control publisher  " \n' +
                '                 name="publisher_id[]"  required>\n' +
                '                    @foreach($publishers as $id => $entry)\n' +
                '                        <option value="{{ $id }}" {{ old('publisher_id ') == $id ? 'selected ' : '' }}>{{ $entry }}</option>\n' +
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
            '            <input class="form-control bill-date " type="text" name="bill_date[]" value="{{ old('bill_date[]') }}" required pattern="^(?:(?:31(\\/|-|\\.)(?:0?[13578]|1[02]))\\1|(?:(?:29|30)(\\/|-|\\.)(?:0?[13-9]|1[0-2])\\2))(?:(?:1[6-9]|[2-9]\\d)?\\d{2})$|^(?:29(\\/|-|\\.)0?2\\3(?:(?:(?:1[6-9]|[2-9]\\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\\d|2[0-8])(\\/|-|\\.)(?:(?:0?[1-9])|(?:1[0-2]))\\4(?:(?:1[6-9]|[2-9]\\d)?\\d{2})$"  autocomplete="off" >\n' +
            '\n' +
            '            \n' +
            '            </td>\n' +
            '           <td><input type="text" inputmode="numeric" pattern="[0-9]*" name="gross[]" class="form-control gross" required autocomplete="off"></td>\n' +
            '           <td><input type="text" inputmode="numeric" pattern="[0-9]*" name="discount[]" class="form-control discount" required autocomplete="off"></td>\n' +
            '           <td><input type="text" inputmode="numeric" pattern="[0-9]*" name="amount[]" class="form-control amount" required autocomplete="off"></td>\n' +
            '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove"><i class="fa fa-trash"></i></button></td>\n' +
                '         </tr>\n';
            $('tbody').append(addRow);
            $('#row' + i + '  select').select2({theme: 'bootstrap-5',});

        };

        /*  $('.remove').live('click', function () {
             var l =$('tbody tr').length;
             if(l==1){
                 alert('you cant delete last one')
             }else{
                 $(this).parent().parent().remove();
             }
         }); */

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            total();
        });

    });

</script>
@endsection
