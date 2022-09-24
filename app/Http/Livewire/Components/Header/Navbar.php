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
                'icon' => 'fas fa-chart-line',
                'route' => route('dashboard'),
                'active' => request()->routeIs('dashboard.*') ? 'active' : '',
            ],
            'users' => [
                'title' => 'Usuários',
                'icon' => 'fas fa-users',
                'route' => route('users.index'),
                'active' => request()->routeIs('users.*') ? 'active' : '',
            ],
            'products' => [
                'title' => 'Produtos',
                'icon' => 'fas fa-box-open',
                'route' => route('products.index'),
                'active' => request()->routeIs('products.*') ? 'active' : '',
            ],
            'movimentations' => [
                'title' => 'Movimentações',
                'icon' => 'fas fa-exchange-alt',
                'route' => route('movimentations.index'),
                'active' => request()->routeIs('movimentations.*') ? 'active' : '',
            ],
            'entries' => [
                'title' => 'Entradas',
                'icon' => 'fas fa-download',
                'route' => route('entries.index'),
                'active' => request()->routeIs('entries.*') ? 'active' : '',
            ],
            'outputs' => [
                'title' => 'Saídas',
                'icon' => 'fas fa-upload',
                'route' => route('outputs.index'),
                'active' => request()->routeIs('outputs.*') ? 'active' : '',
            ],
            'places' => [
                'title' => 'Unidades',
                'icon' => 'fas fa-building',
                'route' => route('places.index'),
                'active' => request()->routeIs('places.*') ? 'active' : '',
            ]
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