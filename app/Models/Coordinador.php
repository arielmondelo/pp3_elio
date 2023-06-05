<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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

    public function contrato(): BelongsTo
    {
        return $this->belongsToMany(Contrato::class, 'contrato_id');
 
    }

    public function entidad(): BelongsTo
    {
        return $this->belongsToMany(Entidad::class, 'entidad_id');
 
    }
}
