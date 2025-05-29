@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Crear Comentario
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.comentarios.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('caso') ? 'has-error' : '' }}">
                            <label class="required" for="caso_id">{{ trans('cruds.comentario.fields.caso') }}</label>
                            <select class="form-control select2" name="caso_id" id="caso_id" required>
                                @foreach($casos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('caso_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('caso'))
                                <span class="help-block" role="alert">{{ $errors->first('caso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.comentario.fields.caso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.comentario.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.comentario.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('propietario') ? 'has-error' : '' }}">
                            <label class="required" for="propietario_id">{{ trans('cruds.comentario.fields.propietario') }}</label>
                            <select class="form-control select2" name="propietario_id" id="propietario_id" required>
                                @foreach($propietarios as $id => $entry)
                                    <option value="{{ $id }}" {{ old('propietario_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('propietario'))
                                <span class="help-block" role="alert">{{ $errors->first('propietario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.comentario.fields.propietario_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label class="required" for="fecha">{{ trans('cruds.comentario.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.comentario.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('comentario') ? 'has-error' : '' }}">
                            <label for="comentario">{{ trans('cruds.comentario.fields.comentario') }}</label>
                            <input class="form-control" type="text" name="comentario" id="comentario" value="{{ old('comentario', '') }}">
                            @if($errors->has('comentario'))
                                <span class="help-block" role="alert">{{ $errors->first('comentario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.comentario.fields.comentario_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                            Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection