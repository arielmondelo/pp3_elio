<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoSolicitud extends Model
{
    protected $table = 'tipo_solicitudes';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
          'nombre',
          'codigo',
        ];
}
