<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'release_date' => $this->faker->date,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'collection' => $this->faker->numberBetween(1, 10),
            'thumbnail' => $this->faker->imageUrl(),
            'preview' => $this->faker->imageUrl(),
        ];
    }
}
