<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public function render()
    {
        // Apunta a la vista blade correcta
        return view('layouts.app');
    }
}
