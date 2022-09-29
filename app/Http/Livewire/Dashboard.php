<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductEntry;
use App\Models\ProductMovimentation;
use App\Models\ProductOutput;
use App\Observers\ProductEntryObserver;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $warningProducts;
    public $largestMovimentations;
    public $newEntries;
    public $newOutputs;
    public $newMovimentations;
    public $newProducts;

    public function mount()
    {
        $this->warningProducts = DB::table('place_product')
            ->select(
                'products.name',
                'place_product.quantity',
                'places.name as place',
                'products.minimum_amount as warning'
            )->join('products', 'place_product.product_id', '=', 'products.id')
            ->join('places', 'place_product.place_id', '=', 'places.id')
            ->where('place_product.quantity', '<', 'products.minimum_amount')
            ->orderBy('place_product.quantity')
            ->get();

        $this->largestMovimentations = DB::table('product_movimentations')
            ->select(
                'product_movimentations.quantity',
                'products.name',
                'users.name as user',
            )->join('products', 'product_movimentations.product_id', '=', 'products.id')
            ->join('users', 'product_movimentations.user_id', '=', 'users.id')
            ->orderBy('product_movimentations.quantity', 'desc')
            ->limit(5)
            ->get();

        $this->newEntries = ProductEntry::where('created_at', Carbon::today())->count();
        $this->newOutputs = ProductOutput::where('created_at', Carbon::today())->count();
        $this->newMovimentations = ProductMovimentation::where('created_at', Carbon::today())->count();
        $this->newProducts = Product::where('created_at', Carbon::today())->count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
