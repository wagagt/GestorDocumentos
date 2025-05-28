@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.agregarCaso.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.agregar-casos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $agregarCaso->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $agregarCaso->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.descripcion') }}
                                    </th>
                                    <td>
                                        {{ $agregarCaso->descripcion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.flujo') }}
                                    </th>
                                    <td>
                                        {{ $agregarCaso->flujo->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.fecha_creacion') }}
                                    </th>
                                    <td>
                                        {{ $agregarCaso->fecha_creacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agregarCaso.fields.encargado') }}
                                    </th>
                                    <td>
                                        {{ $agregarCaso->encargado->nombre ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.agregar-casos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection