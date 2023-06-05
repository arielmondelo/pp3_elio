<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntidadRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre'=>'string|required',
            'tipoEntidad_id'=>'integer|required',
            'nombreRepresentante'=>'string|required',
            'apellidosRepresentante'=>'string|required',
            'telefono'=>'string|required',
            'direccion'=>'string|required',
            'cuenta'=>'string|required',
            'moneda'=>'string|required',
            'codigoReeup'=>'string|required',
            'codigoNit'=>'string|required',
            'titular'=>'string|required',
        ];
    }
}
