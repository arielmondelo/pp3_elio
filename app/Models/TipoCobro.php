<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCobro extends Model
{
    protected $table = 'tipo_cobros';

    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'nombre',
            'codigo'
        ];
}
