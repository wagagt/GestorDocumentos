<?php

namespace App\Http\Requests;

use App\Models\Adjunto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdjuntoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('adjunto_edit');
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
