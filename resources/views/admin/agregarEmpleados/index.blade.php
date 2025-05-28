@extends('layouts.admin')
@section('content')
<div class="content">
    @can('agregar_empleado_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.agregar-empleados.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.agregarEmpleado.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.agregarEmpleado.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AgregarEmpleado">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarEmpleado.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarEmpleado.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarEmpleado.fields.puesto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarEmpleado.fields.email') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agregarEmpleados as $key => $agregarEmpleado)
                                    <tr data-entry-id="{{ $agregarEmpleado->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $agregarEmpleado->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarEmpleado->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarEmpleado->puesto ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarEmpleado->email ?? '' }}
                                        </td>
                                        <td>
                                            @can('agregar_empleado_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.agregar-empleados.show', $agregarEmpleado->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('agregar_empleado_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.agregar-empleados.edit', $agregarEmpleado->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('agregar_empleado_delete')
                                                <form action="{{ route('admin.agregar-empleados.destroy', $agregarEmpleado->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agregar_empleado_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agregar-empleados.massDestroy') }}",
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
  let table = $('.datatable-AgregarEmpleado:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection