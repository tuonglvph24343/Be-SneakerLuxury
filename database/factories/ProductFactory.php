<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'amount' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(100, 10000),
            'thumbail' => $this->faker->imageUrl(640, 480, 'products'),
            'brand_id' => Brand::factory(),
            'category_id' => Category::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
