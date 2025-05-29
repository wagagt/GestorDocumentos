@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Mostrar Caso Paso
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.caso-pasos.index') }}">
                             Regresar a la lista de Caso Pasos
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                
                                <tr>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.caso') }}
                                    </th>
                                    <td>
                                        {{ $casoPaso->caso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.paso') }}
                                    </th>
                                    <td>
                                        {{ $casoPaso->paso->descripcion ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Estado Actual
                                    </th>
                                    <td>
                                        {{ App\Models\CasoPaso::STATUS_ACTUAL_SELECT[$casoPaso->status_actual] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.fecha_inicio') }}
                                    </th>
                                    <td>
                                        {{ $casoPaso->fecha_inicio }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.fecha_fin') }}
                                    </th>
                                    <td>
                                        {{ $casoPaso->fecha_fin }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.caso-pasos.index') }}">
                               Regresar a la lista de Caso Pasos
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection