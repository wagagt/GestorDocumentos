<?php

namespace App\Http\Requests;

use App\Models\Flujo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFlujoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('flujo_edit');
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
        ];
    }
}
