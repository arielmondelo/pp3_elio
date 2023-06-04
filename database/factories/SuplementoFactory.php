<?php

namespace Database\Factories;

use App\Models\Suplemento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SuplementoFactory extends Factory
{
    protected $model = Suplemento::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
