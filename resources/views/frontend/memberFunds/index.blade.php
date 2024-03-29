@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
      <!--       @can('member_fund_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.member-funds.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.memberFund.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'MemberFund', 'route' => 'admin.member-funds.parseCsvImport'])
                    </div>
                </div>
            @endcan -->
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.memberFund.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="">
                        <table class=" table  table-hover datatable datatable-MemberFund">
                            <thead>
                                <tr>
                                   <!--  <th>
                                        {{ trans('cruds.memberFund.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.bookfest') }}
                                    </th> -->
                                    <th>
                                        {{ trans('cruds.memberFund.fields.constituency') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.memberFund.fields.mla') }}
                                    </th>
                                    <th>
                                            FY {{ $finyears[0] }}
                                    </th>
                                    <th>
                                    FY {{ $finyears[1] }}
                                    </th>
                                    <th>
                                    FY {{ $finyears[2] }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($memberFunds as $key => $memberFund)
                                    <tr data-entry-id="{{ $memberFund->id }}">
                                      <!--   <td>
                                            {{ $memberFund->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $memberFund->bookfest->title ?? '' }}
                                        </td> -->
                                        <td>
                                            {{ $memberFund->constituency->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $memberFund->mla->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $memberFund->as_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $memberFund->as_amount_prev ?? '' }}
                                        </td>
                                        <td>
                                            {{ $memberFund->as_amount_next ?? '' }}
                                        </td>
                                        <td>
                                          <!--   @can('member_fund_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.member-funds.show', $memberFund->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan -->

                                            @can('member_fund_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.member-funds.edit', $memberFund->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>

                                                <a  class="btn btn-xs btn-primary" href="{{ route('frontend.member-funds.export', $memberFund->id) }}">
                                                    Download Report
                                                </a>
                                            @endcan

                                           <!--  @can('member_fund_delete')
                                                <form action="{{ route('frontend.member-funds.destroy', $memberFund->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('member_fund_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.member-funds.massDestroy') }}",
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
  let table = $('.datatable-MemberFund:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection