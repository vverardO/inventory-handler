<?php

namespace App\Observers;

use App\Models\Place;
use App\Models\Product;

class PlaceObserver
{
    public function created(Place $place): void
    {
        Product::all()->each(function ($product) use ($place) {
            $place->products()->attach($product->id);
        });
    }

    public function deleted(Place $place): void
    {
        Product::all()->each(function ($product) use ($place) {
            $place->products()->detach($product->id);
        });
    }
}
