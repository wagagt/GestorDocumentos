@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Mostrar información del Paso
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.pasos.index') }}">
                                Regresar a la lista de Pasos
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                               
                                <tr>
                                    <th>
                                        {{ trans('cruds.paso.fields.flujo') }}
                                    </th>
                                    <td>
                                        {{ $paso->flujo->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paso.fields.orden') }}
                                    </th>
                                    <td>
                                        {{ $paso->orden }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paso.fields.descripcion') }}
                                    </th>
                                    <td>
                                        {{ $paso->descripcion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paso.fields.requisitos_aceptacion') }}
                                    </th>
                                    <td>
                                        {{ $paso->requisitos_aceptacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paso.fields.duracion_aproximada') }}
                                    </th>
                                    <td>
                                        {{ $paso->duracion_aproximada }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paso.fields.empleado') }}
                                    </th>
                                    <td>
                                        {{ $paso->empleado->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paso.fields.requisitos_liberacion') }}
                                    </th>
                                    <td>
                                        {{ $paso->requisitos_liberacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paso.fields.estado') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Paso::ESTADO_SELECT[$paso->estado] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.pasos.index') }}">
                               Regresar a la lista de Pasos
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection