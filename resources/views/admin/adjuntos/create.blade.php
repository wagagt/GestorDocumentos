@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crear Adjunto
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.adjuntos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('caso') ? 'has-error' : '' }}">
                            <label class="required" for="caso_id">{{ trans('cruds.adjunto.fields.caso') }}</label>
                            <select class="form-control select2" name="caso_id" id="caso_id" required>
                                @foreach($casos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('caso_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('caso'))
                                <span class="help-block" role="alert">{{ $errors->first('caso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.adjunto.fields.caso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.adjunto.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.adjunto.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.adjunto.fields.tipo') }}</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value disabled {{ old('tipo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Adjunto::TIPO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('tipo', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tipo'))
                                <span class="help-block" role="alert">{{ $errors->first('tipo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.adjunto.fields.tipo_helper') }}</span>
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