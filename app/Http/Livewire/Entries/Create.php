<?php

namespace App\Http\Livewire\Entries;

use App\Models\Place;
use App\Models\Product;
use App\Models\ProductEntry;
use Livewire\Component;

class Create extends Component
{
    public ProductEntry $productEntry;

    public $products;

    public $places;

    protected $rules = [
        'productEntry.product_id' => 'required|integer',
        'productEntry.place_id' => 'required|integer',
        'productEntry.quantity' => 'required',
    ];

    protected $messages = [
        'productEntry.product_id.required' => 'Selecione o produto',
        'productEntry.place_id.required' => 'Selecione o local',
        'productEntry.quantity.required' => 'Insira a quantidade',
    ];

    public function store()
    {
        $this->validate();

        $this->productEntry->user_id = auth()->user()->id;
        $this->productEntry->save();

        session()->flash('message', 'Entrada realizada com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('entries.index');
    }

    public function mount()
    {
        $this->productEntry = new ProductEntry();
        $this->places = Place::select(['name', 'id'])->get();
        $this->products = Product::select(['name', 'id'])->get();
    }

    public function render()
    {
        return view('livewire.entries.create');
    }
}
