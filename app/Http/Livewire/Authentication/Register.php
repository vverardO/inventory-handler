<?php

namespace App\Http\Livewire\Authentication;

use App\Models\AccessRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public User $user;

    public string $name = '';

    public string $email = '';

    public string $password = '';

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:6'],
    ];

    protected $messages = [
        'name.required' => 'Necessário seu nome',
        'password.required' => 'Necessário inserir a senha',
        'password.min' => 'Necessário mínimo 6 digitos',
        'email.required' => 'Necessário informar seu email',
        'email.email' => 'Necessário informar um email válido',
        'email.unique' => 'Este email já está em uso, tente acessar o sistema',
    ];

    public function register()
    {
        $this->validate();

        $this->user = new User();
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->password = Hash::make($this->password);
        $this->user->access_role_id = AccessRole::where('title', 'Sem Acesso')->first()->id;
        $this->user->save();

        session()->flash('message', 'Conta registrada com sucesso!');
        session()->flash('type', 'success');

        Auth::login($this->user);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.authentication.register')
            ->layout('layouts.authentication');
    }
}
