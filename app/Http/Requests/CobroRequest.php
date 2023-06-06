<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CobroRequest extends FormRequest
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
            'tipoCobro_id'=>'integer|required',
            'contratos'=>'array',
            'monto'=>'required',
            'fecha'=>'date|required',
            'nombreProducto'=>'string|required',
            'descripcion'=>'string|required',
            'estado'=>'string|required',

        ];
    }
}
