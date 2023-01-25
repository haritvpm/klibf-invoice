@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                <div class="card-body ">
                <h5 class="card-subtitle mb-2 text-muted">KLIBF Invoice List # {{ $invoiceList->id  }}</h5>

                    <div class="table-responsive">

                        <table class="table ">

                            <tbody>

                                {{-- <tr>
         <td colspan="2">
             {{ trans('cruds.invoiceList.fields.id') }}
                                </td>
                                <td colspan="5">
                                    {{ $invoiceList->id }}
                                </td>
                                </tr> --}}

                                <tr>
                                    <td colspan="2">
                                        {{ trans('cruds.invoiceList.fields.member') }}
                                    </td>
                                    <th colspan="5">
                                        {{ $invoiceList->member->name ?? '' }},
                                        {{ $invoiceList->member->constituency->name ?? '' }}
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        {{ trans('cruds.invoiceList.fields.institution_type') }}
                                    </td>
                                    <td colspan="5">
                                        {{ App\Models\InvoiceList::INSTITUTION_TYPE_RADIO[$invoiceList->institution_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        {{ trans('cruds.invoiceList.fields.institution_name') }}
                                    </td>
                                    <td colspan="5">
                                        {{ $invoiceList->institution_name }}
                                    </td>
                                </tr>
                                <!--  <tr>
                 <th>
                     {{ trans('cruds.invoiceList.fields.amount_allotted') }}
                 </th>
                 <td>
                     {{ $invoiceList->amount_allotted }}
                 </td>
             </tr>
             <tr>
                 <th>
                     {{ trans('cruds.invoiceList.fields.remarks') }}
                 </th>
                 <td>
                     {{ $invoiceList->remarks }}
                 </td>
             </tr> -->


                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">Bill No</th>
                                    <th scope="col">Bill Date</th>
                                    <th scope="col">Gross</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Amount</th>

                                </tr>


                                @foreach($invoiceList->invoiceListInvoiceItems as $key => $invoiceItem)
                                <tr>
                                    <td>
                                        <div class="slno mt-1">{{$loop->index+1}}</div>
                                    </td>
                                    <td>
                                        {{ $invoiceItem->publisher->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $invoiceItem->bill_number ?? '' }}
                                    </td>
                                    <td>
                                        {{ $invoiceItem->bill_date ?? '' }}
                                    </td>

                                    <td>
                                        {{ $invoiceItem->gross ?? '' }}
                                    </td>
                                    <td>
                                        {{ $invoiceItem->discount ?? '' }}
                                    </td>
                                    <td>
                                        {{ $invoiceItem->amount ?? '' }}
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="5"> </td>
                                    <td><b>Total</b></td>
                                    <td><b> {{ $totalsum  ?? '' }}</b></td>

                                </tr>
                            </tfoot>

                        </table>
                    </div>


                    <div class="form-group d-print-none">
                        <a class="btn btn-default" href="{{ route('frontend.invoice-lists.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                </div>


            </div>




        </div>
    </div>
</div>
@endsection
