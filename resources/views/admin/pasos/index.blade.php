@extends('layouts.admin')
@section('content')
<div class="content">
    @can('paso_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.pasos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.paso.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.paso.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Paso">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.flujo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.orden') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.descripcion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.requisitos_aceptacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.duracion_aproximada') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.empleado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.requisitos_liberacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paso.fields.estado') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pasos as $key => $paso)
                                    <tr data-entry-id="{{ $paso->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $paso->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paso->flujo->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paso->orden ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paso->descripcion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paso->requisitos_aceptacion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paso->duracion_aproximada ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paso->empleado->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paso->requisitos_liberacion ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Paso::ESTADO_SELECT[$paso->estado] ?? '' }}
                                        </td>
                                        <td>
                                            @can('paso_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.pasos.show', $paso->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('paso_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.pasos.edit', $paso->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('paso_delete')
                                                <form action="{{ route('admin.pasos.destroy', $paso->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('paso_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pasos.massDestroy') }}",
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
  let table = $('.datatable-Paso:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection