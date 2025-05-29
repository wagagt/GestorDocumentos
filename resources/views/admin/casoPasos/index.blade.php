@extends('layouts.admin')
@section('content')
<div class="content">
    @can('caso_paso_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.caso-pasos.create') }}">
                  Agregar Caso Paso
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.casoPaso.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CasoPaso">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.caso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.paso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.status_actual') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.fecha_inicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.fecha_fin') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($casoPasos as $key => $casoPaso)
                                    <tr data-entry-id="{{ $casoPaso->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $casoPaso->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $casoPaso->caso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $casoPaso->paso->descripcion ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\CasoPaso::STATUS_ACTUAL_SELECT[$casoPaso->status_actual] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $casoPaso->fecha_inicio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $casoPaso->fecha_fin ?? '' }}
                                        </td>
                                        <td>
                                            @can('caso_paso_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.caso-pasos.show', $casoPaso->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('caso_paso_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.caso-pasos.edit', $casoPaso->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('caso_paso_delete')
                                                <form action="{{ route('admin.caso-pasos.destroy', $casoPaso->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('caso_paso_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.caso-pasos.massDestroy') }}",
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
  let table = $('.datatable-CasoPaso:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection