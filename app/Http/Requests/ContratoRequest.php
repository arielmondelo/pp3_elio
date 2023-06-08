<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'entidad_id'=>'integer|required',
            'user_id'=>'integer|required',
            'cobros'=>'array',
            'numeroContrato'=>'string|required',
            'fechaInicio'=>'date|required',
            'fechaFin'=>'date|required',
            'estado'=>'string',
            'monto'=>'required',
            'descripcion'=>'string'
        ];
    }
}
