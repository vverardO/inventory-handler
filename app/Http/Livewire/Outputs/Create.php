<?php

namespace App\Http\Livewire\Outputs;

use App\Models\Place;
use App\Models\Product;
use App\Models\ProductOutput;
use Livewire\Component;

class Create extends Component
{
    public ProductOutput $productOutput;

    public $products;

    public $places;

    protected $rules = [
        'productOutput.product_id' => 'required|integer',
        'productOutput.place_id' => 'required|integer',
        'productOutput.quantity' => 'required',
    ];

    protected $messages = [
        'productOutput.product_id.required' => 'Selecione o produto',
        'productOutput.place_id.required' => 'Selecione o local',
        'productOutput.quantity.required' => 'Insira a quantidade',
    ];

    public function store()
    {
        $this->validate();

        $this->productOutput->user_id = auth()->user()->id;
        $this->productOutput->save();

        session()->flash('message', 'Saída realizada com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('outputs.index');
    }

    public function mount()
    {
        $this->productOutput = new ProductOutput();
        $this->places = Place::select(['name', 'id'])->get();
        $this->products = Product::select(['name', 'id'])->get();
    }

    public function render()
    {
        return view('livewire.outputs.create');
    }
}
