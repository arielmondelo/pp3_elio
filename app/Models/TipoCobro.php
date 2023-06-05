<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoCobro extends Model
{
    protected $table = 'tipo_cobros';

    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'nombre',
            'codigo'
        ];


    public function cobros():HasMany
    {
        return $this->hasMany(Cobro::class);
    }
   
}
