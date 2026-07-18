<?php

namespace App\View\Components\profile;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ProfileContent extends Component
{
    /**
     * Create a new component instance.
     */
 public User $user;


    public function __construct(User $user)
    {
           $this->user = Auth::user();
}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile.profile-content');
    }
}
