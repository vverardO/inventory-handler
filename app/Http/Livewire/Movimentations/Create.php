<?php

namespace App\Http\Livewire\Movimentations;

use App\Models\Place;
use App\Models\Product;
use App\Models\ProductMovimentation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    protected $listeners = [
        'placeFromChanged',
        'placeToChanged',
        'productChanged',
    ];

    public ProductMovimentation $movimentation;

    public $placesFrom;

    public $placesTo;

    public $products;

    public string $placeFromProductQuantity = '';

    public string $placeToProductQuantity = '';

    protected $rules = [
        'movimentation.product_id' => 'required|integer',
        'movimentation.place_from_id' => 'required|integer',
        'movimentation.place_to_id' => 'required|integer',
        'movimentation.quantity' => 'required|lte:placeFromProductQuantity',
    ];

    protected $messages = [
        'movimentation.product_id.required' => 'Selecione o produto',
        'movimentation.place_from_id.required' => 'Selecione o local de saída',
        'movimentation.place_to_id.required' => 'Selecione o local de entrada',
        'movimentation.quantity.required' => 'Insira a quantidade',
        'movimentation.quantity.lte' => 'Quantidade precisa ser menor que a existente no local de saida',
    ];

    public function mount()
    {
        $this->movimentation = new ProductMovimentation();
        $this->placesFrom = Place::select(['name', 'id'])->get();
        $this->placesTo = Place::select(['name', 'id'])->get();
        $this->products = Product::select(['name', 'id'])->get();
    }

    public function placeFromChanged()
    {
        $this->placesTo = Place::whereNot('id', $this->movimentation->place_from_id)->select(['name', 'id'])->get();

        if (empty($this->movimentation->product_id) || $this->movimentation->place_from_id == 'Selecione') {
            return;
        }

        $placeProduct = DB::table('place_product')
            ->select(['quantity'])
            ->where('place_id', $this->movimentation->place_from_id)
            ->where('product_id', $this->movimentation->product_id)
            ->first();

        $this->placeFromProductQuantity = $placeProduct->quantity;
    }

    public function placeToChanged()
    {
        if (empty($this->movimentation->product_id) || $this->movimentation->place_to_id == 'Selecione') {
            return;
        }

        $placeProduct = DB::table('place_product')
            ->select(['quantity'])
            ->where('place_id', $this->movimentation->place_to_id)
            ->where('product_id', $this->movimentation->product_id)
            ->first();

        $this->placeToProductQuantity = $placeProduct->quantity;
    }

    public function productChanged()
    {
        if (
            empty($this->movimentation->place_to_id) ||
            empty($this->movimentation->place_from_id) ||
            $this->movimentation->place_to_id == 'Selecione' ||
            $this->movimentation->place_from_id == 'Selecione'
        ) {
            return;
        }

        $placeProduct = DB::table('place_product')
            ->select(['quantity'])
            ->where('place_id', $this->movimentation->place_to_id)
            ->where('product_id', $this->movimentation->product_id)
            ->first();

        $this->placeToProductQuantity = $placeProduct->quantity;

        $placeProduct = DB::table('place_product')
            ->select(['quantity'])
            ->where('place_id', $this->movimentation->place_from_id)
            ->where('product_id', $this->movimentation->product_id)
            ->first();

        $this->placeFromProductQuantity = $placeProduct->quantity;
    }

    public function store()
    {
        $this->validate();

        $this->movimentation->user_id = auth()->user()->id;
        $this->movimentation->save();

        session()->flash('message', 'Movimentação feita com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('movimentations.index');
    }

    public function render()
    {
        return view('livewire.movimentations.create');
    }
}
