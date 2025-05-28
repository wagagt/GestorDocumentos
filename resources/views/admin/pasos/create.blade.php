@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.paso.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.pasos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('flujo') ? 'has-error' : '' }}">
                            <label class="required" for="flujo_id">{{ trans('cruds.paso.fields.flujo') }}</label>
                            <select class="form-control select2" name="flujo_id" id="flujo_id" required>
                                @foreach($flujos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('flujo_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('flujo'))
                                <span class="help-block" role="alert">{{ $errors->first('flujo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paso.fields.flujo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('orden') ? 'has-error' : '' }}">
                            <label class="required" for="orden">{{ trans('cruds.paso.fields.orden') }}</label>
                            <input class="form-control" type="text" name="orden" id="orden" value="{{ old('orden', '') }}" required>
                            @if($errors->has('orden'))
                                <span class="help-block" role="alert">{{ $errors->first('orden') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paso.fields.orden_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                            <label class="required" for="descripcion">{{ trans('cruds.paso.fields.descripcion') }}</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
                            @if($errors->has('descripcion'))
                                <span class="help-block" role="alert">{{ $errors->first('descripcion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paso.fields.descripcion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('requisitos_aceptacion') ? 'has-error' : '' }}">
                            <label for="requisitos_aceptacion">{{ trans('cruds.paso.fields.requisitos_aceptacion') }}</label>
                            <textarea class="form-control" name="requisitos_aceptacion" id="requisitos_aceptacion">{{ old('requisitos_aceptacion') }}</textarea>
                            @if($errors->has('requisitos_aceptacion'))
                                <span class="help-block" role="alert">{{ $errors->first('requisitos_aceptacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paso.fields.requisitos_aceptacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('duracion_aproximada') ? 'has-error' : '' }}">
                            <label class="required" for="duracion_aproximada">{{ trans('cruds.paso.fields.duracion_aproximada') }}</label>
                            <input class="form-control" type="number" name="duracion_aproximada" id="duracion_aproximada" value="{{ old('duracion_aproximada', '') }}" step="1" required>
                            @if($errors->has('duracion_aproximada'))
                                <span class="help-block" role="alert">{{ $errors->first('duracion_aproximada') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paso.fields.duracion_aproximada_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('empleado') ? 'has-error' : '' }}">
                            <label class="required" for="empleado_id">{{ trans('cruds.paso.fields.empleado') }}</label>
                            <select class="form-control select2" name="empleado_id" id="empleado_id" required>
                                @foreach($empleados as $id => $entry)
                                    <option value="{{ $id }}" {{ old('empleado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('empleado'))
                                <span class="help-block" role="alert">{{ $errors->first('empleado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paso.fields.empleado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('requisitos_liberacion') ? 'has-error' : '' }}">
                            <label for="requisitos_liberacion">{{ trans('cruds.paso.fields.requisitos_liberacion') }}</label>
                            <input class="form-control" type="text" name="requisitos_liberacion" id="requisitos_liberacion" value="{{ old('requisitos_liberacion', '') }}">
                            @if($errors->has('requisitos_liberacion'))
                                <span class="help-block" role="alert">{{ $errors->first('requisitos_liberacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paso.fields.requisitos_liberacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.paso.fields.estado') }}</label>
                            <select class="form-control" name="estado" id="estado" required>
                                <option value disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Paso::ESTADO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('estado', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('estado'))
                                <span class="help-block" role="alert">{{ $errors->first('estado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paso.fields.estado_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection