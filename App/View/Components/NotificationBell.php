<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NotificationBell extends Component
{

    public $notifications;

    public $unreadCount;


    public function __construct()
    {

        $user = auth()->user();


        if($user)
        {

            $this->notifications =
                $user->notifications()
                ->latest()
                ->limit(5)
                ->get();



            $this->unreadCount =
                $user->unreadNotifications()
                ->count();

        }
        else
        {

            $this->notifications = collect();

            $this->unreadCount = 0;

        }

    }



    public function render(): View|Closure|string
    {
        return view('components.notification-bell');
    }
}
