<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntornoVirtualRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombreMV'=> 'string|required',
            'estado' =>'string|required',
            'capacidadDisco' => 'double|required',
            'memoriaRAM' => 'float|required',
            'arquitectura'=>'string|required',
            'sistemaOperativo' => 'string|required',
            'contrasena' => 'string',
            'solicitud_id' => 'integer|required',
        ];
    }
}
