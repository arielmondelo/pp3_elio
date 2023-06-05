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
            'versionProducto'
        ];

    public function entornosVirtuales(): HasMany
    {
        return $this->hasMany(EntornoVirtual::class);
    }

    public function contratos():BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }

    public function entidades():BelongsTo
    {
        return $this->belongsTo(Entidad::class);
    }

    public function tipoSolicitudes():BelongsTo
    {
        return $this->belongsTo(TipoSolicitud::class);
    }
}
