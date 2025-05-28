@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.casoPaso.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.caso-pasos.update", [$casoPaso->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('caso') ? 'has-error' : '' }}">
                            <label class="required" for="caso_id">{{ trans('cruds.casoPaso.fields.caso') }}</label>
                            <select class="form-control select2" name="caso_id" id="caso_id" required>
                                @foreach($casos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('caso_id') ? old('caso_id') : $casoPaso->caso->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('caso'))
                                <span class="help-block" role="alert">{{ $errors->first('caso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.casoPaso.fields.caso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('paso') ? 'has-error' : '' }}">
                            <label class="required" for="paso_id">{{ trans('cruds.casoPaso.fields.paso') }}</label>
                            <select class="form-control select2" name="paso_id" id="paso_id" required>
                                @foreach($pasos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('paso_id') ? old('paso_id') : $casoPaso->paso->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paso'))
                                <span class="help-block" role="alert">{{ $errors->first('paso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.casoPaso.fields.paso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status_actual') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.casoPaso.fields.status_actual') }}</label>
                            <select class="form-control" name="status_actual" id="status_actual" required>
                                <option value disabled {{ old('status_actual', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\CasoPaso::STATUS_ACTUAL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status_actual', $casoPaso->status_actual) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status_actual'))
                                <span class="help-block" role="alert">{{ $errors->first('status_actual') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.casoPaso.fields.status_actual_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_inicio">{{ trans('cruds.casoPaso.fields.fecha_inicio') }}</label>
                            <input class="form-control date" type="text" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio', $casoPaso->fecha_inicio) }}" required>
                            @if($errors->has('fecha_inicio'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_inicio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.casoPaso.fields.fecha_inicio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_fin') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_fin">{{ trans('cruds.casoPaso.fields.fecha_fin') }}</label>
                            <input class="form-control date" type="text" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin', $casoPaso->fecha_fin) }}" required>
                            @if($errors->has('fecha_fin'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_fin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.casoPaso.fields.fecha_fin_helper') }}</span>
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