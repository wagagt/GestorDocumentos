@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Mostrar comentario
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.comentarios.index') }}">
                              Regresar a la lista de comentarios
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>                              
                                <tr>
                                    <th>
                                        {{ trans('cruds.comentario.fields.caso') }}
                                    </th>
                                    <td>
                                        {{ $comentario->caso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.comentario.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $comentario->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.comentario.fields.propietario') }}
                                    </th>
                                    <td>
                                        {{ $comentario->propietario->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.comentario.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $comentario->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.comentario.fields.comentario') }}
                                    </th>
                                    <td>
                                        {{ $comentario->comentario }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.comentarios.index') }}">
                              Regresar a la lista de comentarios
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection