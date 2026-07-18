<?php

namespace App\View\Components\layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{   public $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('components.layouts.sidebar');
    }
}
