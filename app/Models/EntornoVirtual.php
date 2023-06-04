<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntornoVirtual extends Model
{
    protected $table = 'entornos_virtuales';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'nombreMV',
            'estado',
            'capacidadDisco',
            'MemoriaRAM',
            'arquitectura',
            'sistemaOperativo',
            'contrasena',
        ];
}
