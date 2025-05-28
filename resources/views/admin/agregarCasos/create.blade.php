@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.agregarCaso.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.agregar-casos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.agregarCaso.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarCaso.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                            <label class="required" for="descripcion">{{ trans('cruds.agregarCaso.fields.descripcion') }}</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
                            @if($errors->has('descripcion'))
                                <span class="help-block" role="alert">{{ $errors->first('descripcion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarCaso.fields.descripcion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('flujo') ? 'has-error' : '' }}">
                            <label class="required" for="flujo_id">{{ trans('cruds.agregarCaso.fields.flujo') }}</label>
                            <select class="form-control select2" name="flujo_id" id="flujo_id" required>
                                @foreach($flujos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('flujo_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('flujo'))
                                <span class="help-block" role="alert">{{ $errors->first('flujo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarCaso.fields.flujo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_creacion') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_creacion">{{ trans('cruds.agregarCaso.fields.fecha_creacion') }}</label>
                            <input class="form-control date" type="text" name="fecha_creacion" id="fecha_creacion" value="{{ old('fecha_creacion') }}" required>
                            @if($errors->has('fecha_creacion'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_creacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarCaso.fields.fecha_creacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('encargado') ? 'has-error' : '' }}">
                            <label class="required" for="encargado_id">{{ trans('cruds.agregarCaso.fields.encargado') }}</label>
                            <select class="form-control select2" name="encargado_id" id="encargado_id" required>
                                @foreach($encargados as $id => $entry)
                                    <option value="{{ $id }}" {{ old('encargado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('encargado'))
                                <span class="help-block" role="alert">{{ $errors->first('encargado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarCaso.fields.encargado_helper') }}</span>
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