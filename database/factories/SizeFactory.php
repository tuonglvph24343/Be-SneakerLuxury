<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{
    protected $model = Size::class;

    public function definition()
    {
        return [
            'size' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
