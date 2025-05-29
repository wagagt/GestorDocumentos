@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                      Mostrar Flujo
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.flujos.index') }}">
                               Regresar a la lista de Flujos 
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.flujo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $flujo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.flujo.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $flujo->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.flujo.fields.descripcion') }}
                                    </th>
                                    <td>
                                        {{ $flujo->descripcion }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.flujos.index') }}">
                              Regresar a la lista de Flujos 
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection