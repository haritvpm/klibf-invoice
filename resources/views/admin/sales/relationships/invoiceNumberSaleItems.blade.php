@can('sale_item_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sale-items.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.saleItem.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.saleItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-invoiceNumberSaleItems">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.saleItem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.saleItem.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.saleItem.fields.invoice_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.sale.fields.invoice_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.saleItem.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.saleItem.fields.discount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($saleItems as $key => $saleItem)
                        <tr data-entry-id="{{ $saleItem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $saleItem->id ?? '' }}
                            </td>
                            <td>
                                {{ $saleItem->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $saleItem->invoice_number->invoice_number ?? '' }}
                            </td>
                            <td>
                                {{ $saleItem->invoice_number->invoice_date ?? '' }}
                            </td>
                            <td>
                                {{ $saleItem->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $saleItem->discount ?? '' }}
                            </td>
                            <td>
                                @can('sale_item_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sale-items.show', $saleItem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sale_item_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sale-items.edit', $saleItem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sale_item_delete')
                                    <form action="{{ route('admin.sale-items.destroy', $saleItem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

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
@can('sale_item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sale-items.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-invoiceNumberSaleItems:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection