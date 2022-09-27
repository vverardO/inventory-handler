<?php

namespace App\Observers;

use App\Models\Place;
use App\Models\Product;

class ProductObserver
{
    public function created(Product $product): void
    {
        Place::all()->each(function ($place) use ($product) {
            $place->products()->attach($product->id);
        });
    }

    public function deleted(Product $product): void
    {
        Place::all()->each(function ($place) use ($product) {
            $place->products()->detach($product->id);
        });
    }
}
