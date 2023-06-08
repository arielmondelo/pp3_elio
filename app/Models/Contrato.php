<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    //Aquí indico de manera explícita la tabla que está relacionada con este modelo.
    protected $table = 'contratos';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'entidad_id',
            'user_id',
            'numeroContrato',
            'fechaInicio',
            'fechaFin',
            'descripcion',
            'estado',
            'monto',
        ];


    public function entidad():BelongsTo{

        return $this->belongsTo(Entidad::class, 'entidad_id');
    }

    public function usuario():BelongsTo{

        return $this->belongsTo(Contrato::class, 'user_id');
    }

    public function cobros(): BelongsToMany {

        return $this->belongsToMany(Cobro::class, 'cobro_contrato', 'contrato_id', 'cobro_id');
    }

    public function coordinadores(): HasMany
    {
        return $this->hasMany(Coordinador::class);
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class);
    }

    public function suplementos(): HasMany
    {
        return $this->hasMany(Suplemento::class);
    }

}
