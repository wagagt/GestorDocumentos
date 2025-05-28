@extends('layouts.admin')
@section('content')
<div class="content">
    @can('comentario_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.comentarios.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.comentario.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.comentario.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Comentario">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.comentario.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comentario.fields.caso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comentario.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comentario.fields.propietario') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comentario.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comentario.fields.comentario') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comentarios as $key => $comentario)
                                    <tr data-entry-id="{{ $comentario->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $comentario->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $comentario->caso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $comentario->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $comentario->propietario->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $comentario->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $comentario->comentario ?? '' }}
                                        </td>
                                        <td>
                                            @can('comentario_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.comentarios.show', $comentario->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('comentario_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.comentarios.edit', $comentario->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('comentario_delete')
                                                <form action="{{ route('admin.comentarios.destroy', $comentario->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('comentario_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.comentarios.massDestroy') }}",
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
  let table = $('.datatable-Comentario:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection