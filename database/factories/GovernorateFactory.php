<?php

namespace Database\Factories;

use App\Models\Governorate;
use Illuminate\Database\Eloquent\Factories\Factory;

class GovernorateFactory extends Factory
{
    protected $model = Governorate::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'fee' => $this->faker->randomFloat(2, 0, 100),
            'enabled' => $this->faker->boolean,
        ];
    }
}
