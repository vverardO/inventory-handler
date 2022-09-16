<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
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

    public function grantAccess($id)
    {
        $user = User::find($id);
        $user->update(['status' => 1]);
        $user->save();

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Usuário aceito com sucesso!'
        ]);
    }

    public function revokeAccess($id)
    {
        $user = User::find($id);
        $user->update(['status' => 0]);
        $user->save();

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Usuário desativado com sucesso!'
        ]);
    }

    public function render()
    {
        $users = User::where(function (Builder $builder) {
            if ($this->search) {
                $builder->where(function (Builder $builder2) {
                    $builder2->where('name', 'like', '%'.$this->search.'%');
                    $builder2->orWhere('email', 'like', '%'.$this->search.'%');
                    $builder2->orWhere('role', 'like', '%'.$this->search.'%');
                });
            }
        })->orderBy('name')->get();

        return view('livewire.users.index', compact(['users']));
    }
}
