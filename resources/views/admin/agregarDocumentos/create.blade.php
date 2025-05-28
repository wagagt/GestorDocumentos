@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.agregarDocumento.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.agregar-documentos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('caso') ? 'has-error' : '' }}">
                            <label class="required" for="caso_id">{{ trans('cruds.agregarDocumento.fields.caso') }}</label>
                            <select class="form-control select2" name="caso_id" id="caso_id" required>
                                @foreach($casos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('caso_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('caso'))
                                <span class="help-block" role="alert">{{ $errors->first('caso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarDocumento.fields.caso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.agregarDocumento.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarDocumento.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('documento_fisico') ? 'has-error' : '' }}">
                            <label for="documento_fisico">{{ trans('cruds.agregarDocumento.fields.documento_fisico') }}</label>
                            <div class="needsclick dropzone" id="documento_fisico-dropzone">
                            </div>
                            @if($errors->has('documento_fisico'))
                                <span class="help-block" role="alert">{{ $errors->first('documento_fisico') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agregarDocumento.fields.documento_fisico_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.documentoFisicoDropzone = {
    url: '{{ route('admin.agregar-documentos.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="documento_fisico"]').remove()
      $('form').append('<input type="hidden" name="documento_fisico" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="documento_fisico"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($agregarDocumento) && $agregarDocumento->documento_fisico)
      var file = {!! json_encode($agregarDocumento->documento_fisico) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="documento_fisico" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection