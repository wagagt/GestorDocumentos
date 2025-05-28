@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.adjunto.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.adjuntos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.adjunto.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $adjunto->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.adjunto.fields.caso') }}
                                    </th>
                                    <td>
                                        {{ $adjunto->caso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.adjunto.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $adjunto->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.adjunto.fields.tipo') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Adjunto::TIPO_SELECT[$adjunto->tipo] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.adjuntos.index') }}">
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