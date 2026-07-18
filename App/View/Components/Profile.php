<?php

namespace App\View\Components;

use Closure;
use App\Models\User;
use App\Services\ProfileService;
use App\Services\ImageUploadService;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;


class Profile extends Component
{
    public User $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function render(): View
    {
        return view('components.profile', [
            'user' => $this->user,
        ]);
    }
}
