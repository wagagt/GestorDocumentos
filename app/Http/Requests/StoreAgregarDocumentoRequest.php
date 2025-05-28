<?php

namespace App\Http\Requests;

use App\Models\AgregarDocumento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAgregarDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agregar_documento_create');
    }

    public function rules()
    {
        return [
            'caso_id' => [
                'required',
                'integer',
            ],
            'nombre' => [
                'string',
                'required',
            ],
        ];
    }
}
