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

    public function contratos(): BelongsTo
    {
        return $this->belongsToMany(Contrato::class);
 
    }

    public function entidades(): BelongsTo
    {
        return $this->belongsToMany(Entidad::class);
 
    }
}
