<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Cobro extends Model
{
    protected $table = 'cobros';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'tipoCobro_id',
            'monto',
            'fecha',
            'nombreProducto',
            'descripcion',
            'estado',
        ];

    public function contratos(): BelongsTo {

        return $this->belongsTo(Contrato::class, 'cobro_contrato', 'cobro_id', 'contrato_id' );
    }

    public function tipoCobro():BelongsTo
    {
        return $this->belongsTo(TipoCobro::class, 'tipoCobro_id');
    }

}
