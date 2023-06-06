<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
            'titular',
        ];

    public function contratos(): HasOne
    {
        return $this->hasOne(Contrato::class);
    }

    public function tipoEntidad(): BelongsTo {

        return $this->belongsTo(TipoEntidad::class, 'tipoEntidad_id');
    }

    public function coordinadores(): HasMany
    {
        return $this->hasMany(Coordinador::class);
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class);
    }



}
