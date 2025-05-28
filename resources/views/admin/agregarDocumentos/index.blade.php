@extends('layouts.admin')
@section('content')
<div class="content">
    @can('agregar_documento_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.agregar-documentos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.agregarDocumento.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.agregarDocumento.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AgregarDocumento">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarDocumento.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarDocumento.fields.caso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarDocumento.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agregarDocumento.fields.documento_fisico') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agregarDocumentos as $key => $agregarDocumento)
                                    <tr data-entry-id="{{ $agregarDocumento->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $agregarDocumento->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarDocumento->caso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agregarDocumento->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @if($agregarDocumento->documento_fisico)
                                                <a href="{{ $agregarDocumento->documento_fisico->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            @can('agregar_documento_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.agregar-documentos.show', $agregarDocumento->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            {{-- Botón personalizado para editar/ver DOCX --}}
                                            @if ($agregarDocumento->documento_fisico && in_array($agregarDocumento->documento_fisico->mime_type, ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']))
                                                <a class="btn btn-xs btn-warning" href="{{ route('admin.agregar-documentos.editar-doc', $agregarDocumento->id) }}">
                                                    Editar DOCX
                                                </a>
                                            @else
                                                @if ($agregarDocumento->documento_fisico)
                                                    <a class="btn btn-xs btn-info" target="_blank" href="{{ $agregarDocumento->documento_fisico->getUrl() }}">
                                                        Ver Documento
                                                    </a>
                                                @endif
                                            @endif

                                            @can('agregar_documento_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.agregar-documentos.edit', $agregarDocumento->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('agregar_documento_delete')
                                                <form action="{{ route('admin.agregar-documentos.destroy', $agregarDocumento->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agregar_documento_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agregar-documentos.massDestroy') }}",
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
  let table = $('.datatable-AgregarDocumento:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection