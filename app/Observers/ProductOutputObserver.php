<?php

namespace App\Observers;

use App\Models\ProductOutput;
use Illuminate\Support\Facades\DB;

class ProductOutputObserver
{
    public function created(ProductOutput $productOutput): void
    {
        DB::table('place_product')
            ->where('product_id', $productOutput->product_id)
            ->where('place_id', $productOutput->place_id)
            ->decrement('quantity', $productOutput->quantity);
    }

    public function deleted(ProductOutput $productOutput): void
    {
        DB::table('place_product')
            ->where('product_id', $productOutput->product_id)
            ->where('place_id', $productOutput->place_id)
            ->increment('quantity', $productOutput->quantity);
    }
}
