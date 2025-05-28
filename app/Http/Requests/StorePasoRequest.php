<?php

namespace App\Http\Requests;

use App\Models\Paso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePasoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paso_create');
    }

    public function rules()
    {
        return [
            'flujo_id' => [
                'required',
                'integer',
            ],
            'orden' => [
                'string',
                'max:100',
                'required',
            ],
            'descripcion' => [
                'required',
            ],
            'duracion_aproximada' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'empleado_id' => [
                'required',
                'integer',
            ],
            'requisitos_liberacion' => [
                'string',
                'max:150',
                'nullable',
            ],
            'estado' => [
                'required',
            ],
        ];
    }
}
