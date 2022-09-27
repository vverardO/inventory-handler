<?php

namespace App\Observers;

use App\Models\ProductEntry;
use Illuminate\Support\Facades\DB;

class ProductEntryObserver
{
    public function created(ProductEntry $productEntry): void
    {
        DB::table('place_product')
            ->where('product_id', $productEntry->product_id)
            ->where('place_id', $productEntry->place_id)
            ->increment('quantity', $productEntry->quantity);
    }

    public function deleted(ProductEntry $productEntry): void
    {
        DB::table('place_product')
            ->where('product_id', $productEntry->product_id)
            ->where('place_id', $productEntry->place_id)
            ->decrement('quantity', $productEntry->quantity);
    }
}
