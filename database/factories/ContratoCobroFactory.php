<?php

namespace Database\Factories;

use App\Models\ContratoCobro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContratoCobroFactory extends Factory
{
    protected $model = ContratoCobro::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
