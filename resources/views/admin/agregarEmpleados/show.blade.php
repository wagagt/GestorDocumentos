@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                 Mostrar informacion Encargado
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.agregar-empleados.index') }}">
                               Regresar a la lista de encargados
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarEmpleado.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $agregarEmpleado->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarEmpleado.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $agregarEmpleado->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarEmpleado.fields.puesto') }}
                                    </th>
                                    <td>
                                        {{ $agregarEmpleado->puesto }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Correo Electronico
                                    </th>
                                    <td>
                                        {{ $agregarEmpleado->email }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.agregar-empleados.index') }}">
                             Regresar a la lista de encargados
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection