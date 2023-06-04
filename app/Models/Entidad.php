<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entidad extends Model
{
    //Aquí indico de manera explícita la tabla que está relacionada con este modelo.
    protected $table = 'entidades';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'nombre',
            'nombreRepresentante',
            'apellidosRepresentante',
            'telefono',
            'direccion',
            'cuenta',
            'moneda',
            'codigoReeup',
            'codigoNit',
            'titular'
        ];
}
