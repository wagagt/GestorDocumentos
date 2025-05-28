<?php

namespace App\Http\Requests;

use App\Models\AgregarCaso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAgregarCasoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agregar_caso_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:150',
                'required',
            ],
            'descripcion' => [
                'required',
            ],
            'flujo_id' => [
                'required',
                'integer',
            ],
            'fecha_creacion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'encargado_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
