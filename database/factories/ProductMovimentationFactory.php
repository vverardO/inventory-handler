<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductMovimentationFactory extends Factory
{
    public function definition(): array
    {
        $placeId = Place::inRandomOrder()->first()->id;

        return [
            'quantity' => $this->faker->randomNumber(2),
            'product_id' => Product::inRandomOrder()->first()->id,
            'place_from_id' => $placeId,
            'place_to_id' => Place::whereNot('id', $placeId)->inRandomOrder()->first()->id,
        ];
    }
}
