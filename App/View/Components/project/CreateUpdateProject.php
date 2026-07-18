<?php

namespace App\View\Components\project;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateUpdateProject extends Component
{
    public string $mode;

    public ?Project $project;

    public ?string $thumbnailName;


    public function __construct(
        string $mode = 'create',
        ?Project $project = null
    ) {
        $this->mode = $mode;

        $this->project = $project;

        // Handle thumbnail for create and update pages
        $this->thumbnailName = $project?->thumbnail;
    }


    public function render(): View|Closure|string
    {
        return view(
            'components.project.create-update-project'
        );
    }
}
