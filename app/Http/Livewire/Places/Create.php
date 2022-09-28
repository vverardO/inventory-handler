<?php

namespace App\Http\Livewire\Places;

use App\Models\AccessRole;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    protected $rules = [
        'place.name' => 'required',
    ];

    protected $messages = [
        'place.name.required' => 'Insira o nome',
    ];

    public function store()
    {
        $this->validate();

        $this->place->save();

        session()->flash('message', 'Cadastrado com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('places.index');
    }

    public function mount()
    {
        $this->place = new Place();
    }

    public function render()
    {
        return view('livewire.places.create');
    }
}
