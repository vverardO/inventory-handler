<?php

namespace App\Observers;

use App\Models\ProductOutput;
use Illuminate\Support\Facades\DB;

class ProductOutputObserver
{
    public function created(ProductOutput $productOutput): void
    {
        DB::table('products')
            ->where('id', $productOutput->product_id)
            ->decrement('real_time_quantity', $productOutput->quantity);
    }

    public function deleted(ProductOutput $productOutput): void
    {
        DB::table('products')
            ->where('id', $productOutput->product_id)
            ->increment('real_time_quantity', $productOutput->quantity);
    }
}
