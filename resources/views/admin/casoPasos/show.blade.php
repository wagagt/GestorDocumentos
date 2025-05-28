@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.casoPaso.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.caso-pasos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.casoPaso.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $casoPaso->id }}
                                    </td>
                                </tr>
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
                                        {{ trans('cruds.casoPaso.fields.status_actual') }}
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