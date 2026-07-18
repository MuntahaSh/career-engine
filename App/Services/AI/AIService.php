<?php

namespace App\Services\AI;

use App\Contracts\AIProvider;

class AIService
{
    /**
     * Create a new class instance.
     */

    public function __construct(
        protected AIProvider $provider
    ){}

    public function generateBio(array $data): string
    {
        $prompt =
            PromptBuilder::bio($data);

        return $this->provider
            ->generate($prompt);
    }




public function classifyFeaturedProjects(array $projects): string
{


    $prompt =
    PromptBuilder::featuredProject(
        $projects
    );


    return $this->provider
        ->generate($prompt);


}
}
