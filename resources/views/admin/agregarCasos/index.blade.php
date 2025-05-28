@extends('layouts.admin')
@section('content')
<div class="content">
    @can('agregar_caso_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.agregar-casos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.agregarCaso.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.agregarCaso.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AgregarCaso">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.descripcion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.flujo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.fecha_creacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.encargado') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agregarCasos as $key => $agregarCaso)
                                    <tr data-entry-id="{{ $agregarCaso->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $agregarCaso->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarCaso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarCaso->descripcion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarCaso->flujo->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarCaso->fecha_creacion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarCaso->encargado->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @can('agregar_caso_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.agregar-casos.show', $agregarCaso->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('agregar_caso_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.agregar-casos.edit', $agregarCaso->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('agregar_caso_delete')
                                                <form action="{{ route('admin.agregar-casos.destroy', $agregarCaso->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agregar_caso_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agregar-casos.massDestroy') }}",
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
  let table = $('.datatable-AgregarCaso:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection