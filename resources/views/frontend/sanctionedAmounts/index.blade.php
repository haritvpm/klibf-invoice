@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('sanctioned_amount_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.sanctioned-amounts.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.sanctionedAmount.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.sanctionedAmount.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-SanctionedAmount">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.as_amount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.fin_year') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.member') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sanctionedAmount.fields.book_fest') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sanctionedAmounts as $key => $sanctionedAmount)
                                    <tr data-entry-id="{{ $sanctionedAmount->id }}">
                                        <td>
                                            {{ $sanctionedAmount->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sanctionedAmount->as_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sanctionedAmount->fin_year->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sanctionedAmount->member->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sanctionedAmount->book_fest->title ?? '' }}
                                        </td>
                                        <td>
                                            @can('sanctioned_amount_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.sanctioned-amounts.show', $sanctionedAmount->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('sanctioned_amount_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.sanctioned-amounts.edit', $sanctionedAmount->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('sanctioned_amount_delete')
                                                <form action="{{ route('frontend.sanctioned-amounts.destroy', $sanctionedAmount->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sanctioned_amount_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.sanctioned-amounts.massDestroy') }}",
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
  let table = $('.datatable-SanctionedAmount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection