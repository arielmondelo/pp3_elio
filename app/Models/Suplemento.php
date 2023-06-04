<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suplemento extends Model
{
    protected $table = 'suplementos';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'numeroSuplemento',
            'fechaInicio',
            'fechaFin',
            'descripcion',
            'estado',
            'montoAumentar'
        ];
}
