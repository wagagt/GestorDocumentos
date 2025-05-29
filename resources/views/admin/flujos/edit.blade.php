@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Flujo
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.flujos.update", [$flujo->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">Nombre del flujo</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $flujo->nombre) }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.flujo.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                            <label class="required" for="descripcion">{{ trans('cruds.flujo.fields.descripcion') }}</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" required>{{ old('descripcion', $flujo->descripcion) }}</textarea>
                            @if($errors->has('descripcion'))
                                <span class="help-block" role="alert">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                            Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection