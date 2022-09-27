<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'value' => $this->faker->randomFloat(2, 0, 250),
            'minimum_amount' => $this->faker->randomNumber(2),
        ];
    }
}
