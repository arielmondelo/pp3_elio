<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suplemento extends Model
{
    protected $table = 'suplementos';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'numeroSuplemento',
            'fechaInicio',
            'fechaFin',
            'descripcion',
            'estado',
            'montoAumentar'
        ];

    public function contratos():BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }
}
