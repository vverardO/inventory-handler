<?php

namespace App\View\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    public function render(): View
    {
        return view('layouts.app');
    }
}
