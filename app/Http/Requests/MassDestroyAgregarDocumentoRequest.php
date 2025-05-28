<?php

namespace App\Http\Requests;

use App\Models\AgregarDocumento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAgregarDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agregar_documento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:agregar_documentos,id',
        ];
    }
}
