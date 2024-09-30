<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName,
            'full_name' => $this->faker->name,
            'avatar_url' => $this->faker->imageUrl(),
            'role' => $this->faker->randomElement(['user', 'admin']),
        ];
    }
}
