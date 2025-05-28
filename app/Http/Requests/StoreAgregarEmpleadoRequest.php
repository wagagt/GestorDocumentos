<?php

namespace App\Http\Requests;

use App\Models\AgregarEmpleado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAgregarEmpleadoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agregar_empleado_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:150',
                'required',
            ],
            'puesto' => [
                'string',
                'max:150',
                'required',
            ],
        ];
    }
}
