<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatsGrid extends Component
{
public $user;
    public $stats;


    public function __construct()
    {

   $this->user = auth()->user();

        $this->stats = [

            'active_projects' => $this->user
                ->projects()
                ->count(),


            'projects_this_month' => $this->user
                ->projects()
                ->whereMonth(
                    'created_at',
                    now()->month
                )
                ->count(),


            'certificates' => $this->user
                ->certificates()
                ->count(),


            'certificates_pending' => $this->user
                ->certificates()
                ->whereNull('file_path')
                ->count(),


            'skills' => $this->user
                ->skills()
                ->count(),








        ];

    }


    public function render(): View|Closure|string
    {
        return view(
            'components.dashboard.stats-grid'
        );
    }
}
