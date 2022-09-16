<?php

namespace App\Http\Livewire\Users;

use App\Models\AccessRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.password' => 'sometimes',
        'user.access_role_id' => 'required',
    ];

    protected $messages = [
        'user.name.required' => 'Insira o nome',
        'user.email.required' => 'Insira o email',
        'user.access_role_id.required' => 'Selecione o nível de acesso',
    ];

    public function store()
    {
        $this->validate();

        if ($this->user->password) {
            $this->user->password = Hash::make($this->user->password);
        } else {
            unset($this->user->password);
        }

        $this->user->save();

        session()->flash('message', 'Atualizado com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('users.index');
    }

    public function mount($id)
    {
        $this->user = User::with(['accessRole'])->find($id)->makeHidden('password');
    }

    public function render()
    {
        $this->accessRoles = AccessRole::select(['title', 'id'])->get();

        return view('livewire.users.edit');
    }
}
