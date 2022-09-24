<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use App\Traits\Destroyable;
use App\Traits\Showable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Index extends Component
{
    use Showable;
    use Destroyable;

    public string $search = '';

    protected $updatesQueryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->fill(request()->only('search'));
    }

    public function render()
    {
        $products = Product::where(function (Builder $builder) {
            if ($this->search) {
                $builder->where(function (Builder $query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                    $query->orWhere('value', 'like', '%'.$this->search.'%');
                    $query->orWhere('minimum_amount', $this->search);
                });
            }
        })->orderBy('name')->get();

        return view('livewire.products.index', compact(['products']));
    }
}
