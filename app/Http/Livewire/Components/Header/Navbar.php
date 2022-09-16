<?php
 
namespace App\Http\Livewire\Components\Header;
 
use Livewire\Component;

class Navbar extends Component
{
    protected array $menus;

    public function mount()
    {
        $accessRoleTitle = auth()->user()->accessRole->title;

        $this->menus = [
            'dashboard' => [
                'title' => 'Dashboard',
                'icon' => 'bx bx-grid-alt',
                'route' => route('dashboard'),
                'active' => request()->routeIs('dashboard.*') ? 'active' : '',
            ],
        ];

        if ($accessRoleTitle == 'Administrador') {
            // ...
        } else if($accessRoleTitle == 'Usuário') {
            // ...
        } else {
            unset($this->menus['dashboard']);
        }
    }

    public function render()
    {
        return view('livewire.components.header.navbar', ['menus' => $this->menus]);
    }
}