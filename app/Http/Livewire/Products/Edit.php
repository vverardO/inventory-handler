<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public $value;

    public Product $product;

    protected $rules = [
        'product.name' => 'required',
        'product.value' => 'sometimes',
        'value' => 'required',
        'product.minimum_amount' => 'required',
    ];

    protected $messages = [
        'product.name.required' => 'Insira o nome',
        'value.required' => 'Insira o valor',
        'product.minimum_amount.required' => 'Insira a quantidade mínima',
    ];

    public function store()
    {
        $this->validate();

        if (str_contains($this->value, ',')) {
            $this->product->value = str_replace(',', '.', str_replace('.', '', $this->value));
        } else {
            $this->product->value = $this->value;
        }

        $this->product->save();

        session()->flash('message', 'Atualizado com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('products.index');
    }

    public function mount($id)
    {
        $this->product = Product::find($id);

        $this->value = $this->product->value;
    }

    public function render()
    {
        return view('livewire.products.edit');
    }
}
