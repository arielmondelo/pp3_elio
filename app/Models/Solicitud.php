<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Solicitud extends Model
{
    protected $table = 'solicitudes';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'numeroExpediente',
            'fechaInicio',
            'fechaFin',
            'estado',
            'descripcion',
            'nombreProducto',
            'versionProducto',
            'contrato',
            'entidad_id',
            'tipoSolicitud_id', 

        ];

    public function entornosVirtuales(): HasMany
    {
        return $this->hasMany(EntornoVirtual::class);
    }

     

    public function entidad():BelongsTo
    {
        return $this->belongsTo(Entidad::class, 'entidad_id');
    }

    public function tipoSolicitud():BelongsTo
    {
        return $this->belongsTo(TipoSolicitud::class , 'tipoSolicitud_id');
    }
}
