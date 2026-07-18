<?php

namespace App\Services\AI;


use App\Models\Project;



class ProjectFeatureClassifier
{


    public function __construct(
        protected AIService $ai
    ){}



public function classify($userId)
{
    $analyzed = 0;
    $skipped = 0;


    $projects = Project::query()
        ->where('user_id', $userId)
        ->get();


    foreach($projects as $project)
    {

        if(!$this->isComplete($project))
        {


            $skipped++;

            $project->update([

                'is_featured' => false,

                'ai_score' => 0,

                'ai_reason' => 'Incomplete project information'

            ]);

            continue;
        }

if($this->analyzeProject($project)) {
    $analyzed++;
}

    }


    return [
        'analyzed' => $analyzed,
        'skipped' => $skipped
    ];
}




    private function isComplete(Project $project): bool
    {


        $fields=[

            'title',
            'summary',
            'description',
            'category',
            'tech_stack',
            'thumbnail',
              'github_url',
        'demo_url',


        ];



        foreach($fields as $field)
        {


            if(empty($project->$field))
            {

                return false;

            }

        }




        if(
            empty($project->github_url)
            &&
            empty($project->demo_url)
        )
        {

            return false;

        }



        return true;


    }




private function analyzeProject(Project $project)
{

    $response = $this->ai
        ->classifyFeaturedProjects([
            [
                'id' => $project->id,
                'title' => $project->title,
                'summary' => $project->summary,
                'description' => $project->description,
                'category' => $project->category,
                'tech_stack' => $project->tech_stack,
                'github_url' => $project->github_url,
                'demo_url' => $project->demo_url,
            ]
        ]);


    $result = json_decode($response, true);


    if(isset($result[0]))
    {

        $data=$result[0];


        $project->update([
            'is_featured'=>$data['score'] >= 80,
            'ai_score'=>$data['score'],
            'ai_reason'=>$data['reason'],
        ]);


        return true;

    }


    return false;

}


}
