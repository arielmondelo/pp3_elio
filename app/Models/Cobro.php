<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Cobro extends Model
{
    protected $table = 'cobros';

    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'monto',
            'fecha',
            'nombreProducto',
            'descripcion',
            'estado'
        ];

    public function contratos(): BelongsToMany {

        return $this->belongsToMany(Contrato::class, 'cobro_contrato', 'cobro_id', 'contrato_id' );
    }
}
