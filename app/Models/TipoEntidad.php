<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEntidad extends Model
{
    protected $table = 'tipo_entidades';
    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'nombre',
            'codigo'
        ];

    public function entidades(): HasMany
    {
        return $this->hasMany(Entidad::class, 'tipoEntidad_id');
    }
}
