@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.agregarDocumento.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-danger" href="{{ route('admin.agregar-documentos.index') }}">
                               Regresar
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th scope="col">
                                        {{ trans('cruds.agregarDocumento.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $agregarDocumento->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarDocumento.fields.caso') }}
                                    </th>
                                    <td>
                                        {{ $agregarDocumento->caso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarDocumento.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $agregarDocumento->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarDocumento.fields.documento_fisico') }}
                                    </th>
                                    <td>
                                        @if($agregarDocumento->documento_fisico)
                                            <a href="{{ $agregarDocumento->documento_fisico->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        @if(isset($htmlContent))
                            <div class="card mt-4">
                                <h3 class="card-title">
                                            <i class="fas fa-edit"></i> Editor de Documento
                                        </h3>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.agregar-documentos.guardar-doc', $agregarDocumento->id) }}">
                                        @csrf
                                        <textarea id="editor" name="content">{!! $htmlContent !!}</textarea>
                                        <div class="mt-3 text-end">
                                            <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save"></i> Guardar Cambios
                                                </button>
                                                <a href="{{ route('admin.agregar-documentos.index') }}" class="btn btn-default">
                                                    Cancelar
                                                </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif

                        <!-- <div class="form-group mt-3">
                            <a class="btn btn-default" href="{{ route('admin.agregar-documentos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/0lwnqrg167r0r775nqgmsg9931abueaobozbeo8oi4c9fp1s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 600,
        menubar: true,
        plugins: 'lists link image table code',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image table | code',
        branding: false,
        statusbar: false,
        resize: true,
        content_style: `
            body {
                font-family: "Segoe UI", Roboto, Arial, sans-serif;
                font-size: 14px;
                color: #333;
                padding: 20px;
                line-height: 1.6;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #ccc;
                padding: 8px;
            }
        `
    });
</script>
@endsection
