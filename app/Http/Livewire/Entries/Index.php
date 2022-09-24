<?php

namespace App\Http\Livewire\Entries;

use App\Models\ProductEntry;
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
        $entries = ProductEntry::with(['product', 'user'])->where(function (Builder $builder) {
            if ($this->search) {
                $builder->where(function (Builder $query) {
                    $query->where('user.name', 'like', '%'.$this->search.'%');
                    $query->where('user.email', 'like', '%'.$this->search.'%');
                    $query->where('product.name', 'like', '%'.$this->search.'%');
                    $query->orWhere('quantity', $this->search);
                });
            }
        })->orderBy('id', 'desc')->get();

        return view('livewire.entries.index', compact(['entries']));
    }
}