<?php

namespace App\Http\Requests;

use App\Models\CasoPaso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCasoPasoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('caso_paso_create');
    }

    public function rules()
    {
        return [
            'caso_id' => [
                'required',
                'integer',
            ],
            'paso_id' => [
                'required',
                'integer',
            ],
            'status_actual' => [
                'required',
            ],
            'fecha_inicio' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_fin' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
