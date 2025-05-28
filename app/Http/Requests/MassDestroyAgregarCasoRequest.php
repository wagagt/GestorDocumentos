<?php

namespace App\Http\Requests;

use App\Models\AgregarCaso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAgregarCasoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agregar_caso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:agregar_casos,id',
        ];
    }
}
