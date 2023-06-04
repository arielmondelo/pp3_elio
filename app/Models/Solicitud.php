<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'numeroExpediente',
            'fechaInicio',
            'fechaFin',
            'estado',
            'descripcion',
            'nombreProducto',
            'versionProducto'
        ];
}
