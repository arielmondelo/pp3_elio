<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cobro extends Model
{
    protected $table = 'cobros';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
          'tipoCobro',
            'monto',
            'fecha',
            'nombreProducto',
            'descripcion',
            'estado'
        ];
}
