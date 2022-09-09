<?php

namespace App\Observers;

use App\Models\ProductEntry;
use Illuminate\Support\Facades\DB;

class ProductEntryObserver
{
    public function created(ProductEntry $productEntry): void
    {
        DB::table('products')
            ->where('id', $productEntry->product_id)
            ->increment('real_time_quantity', $productEntry->quantity);
    }

    public function deleted(ProductEntry $productEntry): void
    {
        DB::table('products')
            ->where('id', $productEntry->product_id)
            ->decrement('real_time_quantity', $productEntry->quantity);
    }
}
