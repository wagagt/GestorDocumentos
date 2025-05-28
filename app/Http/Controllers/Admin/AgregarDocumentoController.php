<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAgregarDocumentoRequest;
use App\Http\Requests\StoreAgregarDocumentoRequest;
use App\Http\Requests\UpdateAgregarDocumentoRequest;
use App\Models\AgregarCaso;
use App\Models\AgregarDocumento;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\IOFactory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AgregarDocumentoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agregar_documento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarDocumentos = AgregarDocumento::with(['caso', 'media'])->get();

        return view('admin.agregarDocumentos.index', compact('agregarDocumentos'));
    }

    public function create()
    {
        abort_if(Gate::denies('agregar_documento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casos = AgregarCaso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.agregarDocumentos.create', compact('casos'));
    }

    public function store(StoreAgregarDocumentoRequest $request)
    {
        $agregarDocumento = AgregarDocumento::create($request->all());

        if ($request->input('documento_fisico', false)) {
            $agregarDocumento->addMedia(storage_path('tmp/uploads/' . basename($request->input('documento_fisico'))))->toMediaCollection('documento_fisico');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $agregarDocumento->id]);
        }

        return redirect()->route('admin.agregar-documentos.index');
    }

    public function edit(AgregarDocumento $agregarDocumento)
    {
        abort_if(Gate::denies('agregar_documento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casos = AgregarCaso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agregarDocumento->load('caso');

        return view('admin.agregarDocumentos.edit', compact('agregarDocumento', 'casos'));
    }

    public function update(UpdateAgregarDocumentoRequest $request, AgregarDocumento $agregarDocumento)
    {
        $agregarDocumento->update($request->all());

        if ($request->input('documento_fisico', false)) {
            if (! $agregarDocumento->documento_fisico || $request->input('documento_fisico') !== $agregarDocumento->documento_fisico->file_name) {
                if ($agregarDocumento->documento_fisico) {
                    $agregarDocumento->documento_fisico->delete();
                }
                $agregarDocumento->addMedia(storage_path('tmp/uploads/' . basename($request->input('documento_fisico'))))->toMediaCollection('documento_fisico');
            }
        } elseif ($agregarDocumento->documento_fisico) {
            $agregarDocumento->documento_fisico->delete();
        }

        return redirect()->route('admin.agregar-documentos.index');
    }

    public function show(AgregarDocumento $agregarDocumento)
    {
        abort_if(Gate::denies('agregar_documento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarDocumento->load('caso');

        return view('admin.agregarDocumentos.show', compact('agregarDocumento'));
    }

    public function destroy(AgregarDocumento $agregarDocumento)
    {
        abort_if(Gate::denies('agregar_documento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarDocumento->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgregarDocumentoRequest $request)
    {
        $agregarDocumentos = AgregarDocumento::find(request('ids'));

        foreach ($agregarDocumentos as $agregarDocumento) {
            $agregarDocumento->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('agregar_documento_create') && Gate::denies('agregar_documento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AgregarDocumento();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    //Para editar documentos desde la WEB
    public function editarDocumento($id)
    {
        $documento = AgregarDocumento::findOrFail($id);

        // Validar que el archivo sea Word
        $mimeTypesPermitidos = [
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        if (!$documento->documento_fisico || !in_array($documento->documento_fisico->mime_type, $mimeTypesPermitidos)) {
            abort(403, 'Este archivo no se puede editar en línea.');
        }

        // Obtener contenido del archivo Word y convertirlo a HTML
        $path = storage_path('app/public/' . $documento->documento_fisico->id . '/' . $documento->documento_fisico->file_name);

        if (!file_exists($path)) {
            abort(404, 'Archivo no encontrado.');
        }

        $phpWord = \PhpOffice\PhpWord\IOFactory::load($path);
        $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');

        ob_start();
        $writer->save('php://output');
        $htmlContent = ob_get_clean();

        return view('admin.agregarDocumentos.editar-docx', compact('documento', 'htmlContent'));
    }

    public function guardarDocumento(Request $request, AgregarDocumento $documento)
    {
        $content = $request->input('content');

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        Html::addHtml($section, $content, false, false);

        $fileName = 'documento_editado_' . time() . '.docx';
        $path = storage_path('app/public/' . $fileName);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($path);

        // Reemplazar archivo
        $documento->clearMediaCollection('documento_fisico');
        $documento->addMedia($path)->toMediaCollection('documento_fisico');

        return redirect()->route('admin.agregar-documentos.index')->with('success', 'Documento actualizado');
    }

}
