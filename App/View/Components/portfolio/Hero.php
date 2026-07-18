<?php

namespace App\View\Components\Portfolio;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class Hero extends Component
{
    public function __construct(
        public User $user
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.portfolio.hero');
    }
}
