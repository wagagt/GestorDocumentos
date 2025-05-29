@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Agregar Flujo
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.flujos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.flujo.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.flujo.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                            <label class="required" for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
                            @if($errors->has('descripcion'))
                                <span class="help-block" role="alert">{{ $errors->first('descripcion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.flujo.fields.descripcion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                               Crear Flujo
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection