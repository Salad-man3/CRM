<?php

namespace Database\Factories;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition()
    {
        return [
            'item' => $this->faker->numberBetween(1, 100),
            'additional_options' => $this->faker->text,
            'profile' => $this->faker->uuid,
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'order_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
