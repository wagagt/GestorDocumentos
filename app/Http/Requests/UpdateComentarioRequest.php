<?php

namespace App\Http\Requests;

use App\Models\Comentario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateComentarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('comentario_edit');
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
            'propietario_id' => [
                'required',
                'integer',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'comentario' => [
                'string',
                'nullable',
            ],
        ];
    }
}
