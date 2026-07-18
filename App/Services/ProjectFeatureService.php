<?php
// responsible for AI communication.
namespace App\Services;

use App\Models\Project;
use App\Services\AI\AIService;

class ProjectFeatureService
{
   public function __construct(
        protected AIService $ai
    ){}

    public function classify(Project $project)
    {

        $result = $this->ai->classifyProject([
            'title'=>$project->title,
            'category'=>$project->category,
            'summary'=>$project->summary,
            'description'=>$project->description,
            'tech_stack'=>$project->tech_stack,
        ]);


        $project->update([
            'is_featured'=>$result['featured'],
            'ai_score'=>$result['score'],
            'ai_reason'=>$result['reason'],
            'classified_at'=>now(),
        ]);

        return $project;

    }
}
