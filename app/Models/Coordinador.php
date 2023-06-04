<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordinador extends Model
{
    protected $table = 'coordinadores';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'nombre',
            'apellidos',
            'telefono',
            'correo'
        ];
}
