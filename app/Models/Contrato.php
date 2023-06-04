<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    //Aquí indico de manera explícita la tabla que está relacionada con este modelo.
    protected $table = 'contratos';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'numeroContrato',
            'fechaInicio',
            'fechaFin',
            'descripcion',
            'estado',
            'monto'
        ];
}
