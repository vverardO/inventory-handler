<?php

namespace App\Http\Livewire\Places;

use App\Models\Place;
use Livewire\Component;

class Edit extends Component
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

        session()->flash('message', 'Atualizado com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('places.index');
    }

    public function mount($id)
    {
        $this->place = Place::with(['products'])->find($id);
    }

    public function render()
    {
        return view('livewire.places.edit');
    }
}
