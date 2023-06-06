<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudRequest extends FormRequest
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
            'tipoSolicitud_id' =>'string|required',
            'entidad_id' =>'string|required',
            'contrato_id' =>'string|required',
            'numeroExpediente' =>'string|required',
            'fechaInicio' =>'date',
            'fechaFin' =>'date',
            'estado' =>'string|required',
            'descripcion' =>'string',
            'nombreProducto' =>'string|required',
            'versionProducto' =>'string|required',

        ];
    }
}
