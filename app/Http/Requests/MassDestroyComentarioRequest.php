<?php

namespace App\Http\Requests;

use App\Models\Comentario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyComentarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('comentario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:comentarios,id',
        ];
    }
}
