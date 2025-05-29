@extends('layouts.admin')
@section('content')
<div class="content">
    <h3>Editar Documento: {{ $documento->nombre }}</h3>
    <form method="POST" action="{{ route('admin.agregar-documentos.guardar-doc', $documento->id) }}">
        @csrf
        <textarea id="editor" name="content">{{ $htmlContent }}</textarea>
        <button type="submit" class="btn btn-primary mt-2">Guardar Cambios</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
 <script src="https://cdn.tiny.cloud/1/0lwnqrg167r0r775nqgmsg9931abueaobozbeo8oi4c9fp1s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#editor',
    height: 600,
    plugins: 'lists link image table code',
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | code',
  });
</script>
@endsection
