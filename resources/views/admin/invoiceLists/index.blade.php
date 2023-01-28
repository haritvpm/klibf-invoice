@extends('layouts.admin')
@section('content')
<!-- @can('invoice_list_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.invoice-lists.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.invoiceList.title_singular') }}
            </a>
        </div>
    </div>
@endcan -->
<div class="card">
    <div class="card-header">
        {{ trans('cruds.invoiceList.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-InvoiceList">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.invoiceList.fields.id') }}
                        </th>
                        <th>
                           CreatedBy
                        </th>

                        <th>
                           BookFest
                        </th>
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
                            {{ trans('cruds.invoiceList.fields.member') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.constituency') }}
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

                            </td>
                            <td>
                                {{ $invoiceList->id ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceList->created_by->name ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceList->bookfest->title ?? '' }}
                            </td>
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
                                {{ $invoiceList->member_fund->constituency->name ?? '' }}
                            </td>
                            <td>
                                @can('invoice_list_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.invoice-lists.show', $invoiceList->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('invoice_list_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.invoice-lists.edit', $invoiceList->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('invoice_list_delete')
                                    <form action="{{ route('admin.invoice-lists.destroy', $invoiceList->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.invoice-lists.massDestroy') }}",
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
  let table = $('.datatable-InvoiceList:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection