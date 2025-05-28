<?php

namespace App\Http\Requests;

use App\Models\CasoPaso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCasoPasoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('caso_paso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:caso_pasos,id',
        ];
    }
}
