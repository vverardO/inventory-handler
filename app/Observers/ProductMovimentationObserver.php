<?php

namespace App\Observers;

use App\Models\ProductMovimentation;
use Illuminate\Support\Facades\DB;

class ProductMovimentationObserver
{
    public function created(ProductMovimentation $productMovimentation): void
    {
        DB::table('place_product')
            ->where('product_id', $productMovimentation->product_id)
            ->where('place_id', $productMovimentation->place_from_id)
            ->decrement('quantity', $productMovimentation->quantity);

        DB::table('place_product')
            ->where('product_id', $productMovimentation->product_id)
            ->where('place_id', $productMovimentation->place_to_id)
            ->increment('quantity', $productMovimentation->quantity);
    }

    public function deleted(ProductMovimentation $productMovimentation): void
    {
        DB::table('place_product')
            ->where('product_id', $productMovimentation->product_id)
            ->where('place_id', $productMovimentation->place_from_id)
            ->decrement('quantity', $productMovimentation->quantity);

        DB::table('place_product')
            ->where('product_id', $productMovimentation->product_id)
            ->where('place_id', $productMovimentation->place_to_id)
            ->increment('quantity', $productMovimentation->quantity);
    }
}
