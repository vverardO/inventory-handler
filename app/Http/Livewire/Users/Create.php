<?php

namespace App\Http\Livewire\Users;

use App\Models\AccessRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.password' => 'required|string',
        'user.access_role_id' => 'required',
    ];

    protected $messages = [
        'user.name.required' => 'Insira o nome',
        'user.email.required' => 'Insira o email',
        'user.password.required' => 'Insira a senha',
        'user.access_role_id.required' => 'Selecione o nível de acesso',
    ];

    public function store()
    {
        $this->validate();

        $this->user->password = Hash::make($this->user->password);

        $this->user->save();

        session()->flash('message', 'Usuário cadastrado com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('users.index');
    }

    public function mount()
    {
        $this->user = new User();
    }

    public function render()
    {
        $this->accessRoles = AccessRole::select(['title', 'id'])->get();

        return view('livewire.users.create');
    }
}
