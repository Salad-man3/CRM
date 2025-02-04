<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectionFactory extends Factory
{
    protected $model = Collection::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'season' => $this->faker->numberBetween(1, 4),
        ];
    }
}
