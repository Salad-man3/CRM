<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'status' => $this->faker->word,
            'subtotal' => $this->faker->randomFloat(2, 1, 100),
            'tax' => $this->faker->randomFloat(2, 0, 10),
            'tax_rate' => $this->faker->randomFloat(2, 0, 1),
            'shopping_fee' => $this->faker->randomFloat(2, 0, 10),
            'shipping_to' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->randomFloat(2, 1, 100),
            'shipping_address' => $this->faker->address,
            'extra_shipping_info' => $this->faker->text,
            'profile' => $this->faker->uuid,
        ];
    }
}
