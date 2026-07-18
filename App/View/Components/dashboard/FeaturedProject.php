<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedProject extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $projects =
            auth()->user()
            ->projects()
            ->where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();


        return view(
            'components.dashboard.featured-project',
            compact('projects')
        );
    }
}
