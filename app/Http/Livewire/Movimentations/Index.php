<?php

namespace App\Http\Livewire\Movimentations;

use App\Models\ProductMovimentation;
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
        $movimentations = ProductMovimentation::with(['product', 'from', 'to'])->where(function (Builder $builder) {
            if ($this->search) {
                $builder->where(function (Builder $query) {
                    $query->whereRelation('product', 'name', 'like', '%'.$this->search.'%');
                    $query->orWhereRelation('from', 'name', 'like', '%'.$this->search.'%');
                    $query->orWhereRelation('to', 'name', 'like', '%'.$this->search.'%');
                    $query->orWhere('quantity', $this->search);
                });
            }
        })->orderBy('id', 'desc')->get();

        return view('livewire.movimentations.index', compact(['movimentations']));
    }
}
