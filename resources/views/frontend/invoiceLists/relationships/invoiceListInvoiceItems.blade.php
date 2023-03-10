

<div class="card">
    <div class="card-header">
        {{ trans('cruds.invoiceItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-invoiceListInvoiceItems">
                <thead>
                    <tr>
                        <th >

                        </th>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.publisher') }}
                        </th>
                        
                        <th>
                            {{ trans('cruds.invoiceItem.fields.bill_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.bill_date') }}
                        </th>
                        <!-- <th>
                            {{ trans('cruds.invoiceItem.fields.invoice_list') }}
                        </th> -->
                        <!-- <th>
                            {{ trans('cruds.invoiceList.fields.number') }}
                        </th> -->
                        <!-- <th>
                            {{ trans('cruds.invoiceList.fields.institution_type') }}
                        </th> -->
                        <th>
                            {{ trans('cruds.invoiceItem.fields.gross') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.discount') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceItem.fields.amount') }}
                        </th>
                       <!--  <th>
                            &nbsp;
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoiceItems as $key => $invoiceItem)
                        <tr data-entry-id="{{ $invoiceItem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $invoiceItem->id ?? '' }}
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
                            <!-- <td>
                                {{ $invoiceItem->invoice_list->institution_name ?? '' }}
                            </td> -->
                            <!-- <td>
                                {{ $invoiceItem->invoice_list->number ?? '' }}
                            </td> -->
                            <td>
                                {{ $invoiceItem->gross ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceItem->discount ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceItem->amount ?? '' }}
                            </td>
                            <!-- <td>
                                @if($invoiceItem->invoice_list)
                                    {{ $invoiceItem->invoice_list::INSTITUTION_TYPE_RADIO[$invoiceItem->invoice_list->institution_type] ?? '' }}
                                @endif
                            </td> -->
                           <!--  <td>
                                @can('invoice_item_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('frontend.invoice-items.show', $invoiceItem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('invoice_item_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('frontend.invoice-items.edit', $invoiceItem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('invoice_item_delete')
                                    <form action="{{ route('frontend.invoice-items.destroy', $invoiceItem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td> -->

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('invoice_item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.invoice-items.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-invoiceListInvoiceItems:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection