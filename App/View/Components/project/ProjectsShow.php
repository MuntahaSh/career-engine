<?php

namespace App\View\Components\project;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;


class ProjectsShow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // no-op; projects are fetched in render()
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
          $projects = Project::query()
        ->where('user_id', Auth::id())
        ->latest('updated_at')
        ->get();

        return view('components.project.projects-show', compact('projects'));
    }
}

