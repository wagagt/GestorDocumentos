@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Agregar nuevo Empleado
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.agregar-empleados.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.agregarEmpleado.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('puesto') ? 'has-error' : '' }}">
                            <label class="required" for="puesto">{{ trans('cruds.agregarEmpleado.fields.puesto') }}</label>
                            <input class="form-control" type="text" name="puesto" id="puesto" value="{{ old('puesto', '') }}" required>
                            @if($errors->has('puesto'))
                                <span class="help-block" role="alert">{{ $errors->first('puesto') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.puesto_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Correo electronico</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                               Crear empleado
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection