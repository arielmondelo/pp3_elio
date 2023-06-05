<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class EntornoVirtual extends Model
{
    protected $table = 'entornos_virtuales';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'nombreMV',
            'estado',
            'capacidadDisco',
            'memoriaRAM',
            'arquitectura',
            'sistemaOperativo',
            'contrasena',
        ];


    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class, 'solicitud_id');
        
    }
}
