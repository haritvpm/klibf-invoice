@extends('layouts.admin')
@section('content')
@can('mla_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mlas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mla.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Mla', 'route' => 'admin.mlas.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.mla.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Mla">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mla.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mla.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.mla.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.mla.fields.name_mal') }}
                        </th>
                        <th>
                            {{ trans('cruds.mla.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mlas as $key => $mla)
                        <tr data-entry-id="{{ $mla->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mla->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Mla::TITLE_SELECT[$mla->title] ?? '' }}
                            </td>
                            <td>
                                {{ $mla->name ?? '' }}
                            </td>
                            <td>
                                {{ $mla->name_mal ?? '' }}
                            </td>
                            <td>
                                {{ $mla->remarks ?? '' }}
                            </td>
                            <td>
                                @can('mla_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mlas.show', $mla->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mla_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mlas.edit', $mla->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mla_delete')
                                    <form action="{{ route('admin.mlas.destroy', $mla->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mla_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mlas.massDestroy') }}",
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
  let table = $('.datatable-Mla:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection