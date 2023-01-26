@extends('layouts.frontend')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

        @if ($bookfest)
          @can('invoice_list_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-primary" href="{{ route('frontend.invoice-lists.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.invoiceList.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
        @else
        No active bookfest<hr/>
        @endif


@if ($bookfest)
<div class="card">
    <div class="card-header">
        {{ trans('cruds.invoiceList.title_singular')  }}
    </div>

    <div class="card-body">
        <div class="">
            <table class=" table  table-hover datatable datatable-InvoiceList">
                <thead>
                    <tr>
                       
                        <th>
                            {{ trans('cruds.invoiceList.fields.id') }}
                        </th>
                        <!-- <th>
                            {{ trans('cruds.invoiceList.fields.number') }}
                        </th> -->
                        <th>
                            {{ trans('cruds.invoiceList.fields.institution_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceList.fields.institution_name') }}
                        </th>
                      <!--   <th>
                            {{ trans('cruds.invoiceList.fields.amount_allotted') }}
                        </th> -->
                      <!--   <th>
                            {{ trans('cruds.invoiceList.fields.remarks') }}
                        </th> -->
                        <th>
                            Member
                        </th>
                        <th>
                            Sum
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoiceLists as $key => $invoiceList)
                        <tr data-entry-id="{{ $invoiceList->id }}">
                            
                            <td>
                                {{ $invoiceList->id ?? '' }}
                            </td>
                            <!-- <td>
                                {{ $invoiceList->number ?? '' }}
                            </td> -->
                            <td>
                                {{ App\Models\InvoiceList::INSTITUTION_TYPE_RADIO[$invoiceList->institution_type] ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceList->institution_name ?? '' }}
                            </td>
                          <!--   <td>
                                {{ $invoiceList->amount_allotted ?? '' }}
                            </td> -->
                          <!--   <td>
                                {{ $invoiceList->remarks ?? '' }}
                            </td> -->
                            <td>
                                {{ $invoiceList->member_fund->mla->name ?? '' }} 
                                
                            </td>
                            <td>
                     
                                {{ $invoiceList->invoice_list_invoice_items_sum_amount ?? '' }}
                            </td>
                            <td>
                                @can('invoice_list_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('frontend.invoice-lists.show', $invoiceList->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('invoice_list_edit')
                                    <a class="btn btn-xs  btn-dark " href="{{ route('frontend.invoice-lists.edit', $invoiceList->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                              <!--   @can('invoice_list_delete')
                                    <form action="{{ route('frontend.invoice-lists.destroy', $invoiceList->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan -->

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

</div>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('invoice_list_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.invoice-lists.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 0, 'desc' ]],
    pageLength: 100,
    columnDefs: [
    { searchable: false, targets: 4 } //ignore sum.  search by id only if a number
  ]
  });
  let table = $('.datatable-InvoiceList:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection