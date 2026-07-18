<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\AI\ProjectFeatureClassifier;

class AIProjectController extends Controller
{

    public function classify(
        ProjectFeatureClassifier $classifier
    )
    {

        $result = $classifier->classify(
            Auth::id()
        );


        if($result['analyzed'] === 0)
        {

            return back()
                ->with(
                    'warning',
                    "No projects were analyzed. {$result['skipped']} projects need more information."
                );

        }


        return back()
            ->with(
                'success',
                "AI analyzed {$result['analyzed']} projects successfully. {$result['skipped']} projects were skipped."
            );

    }

}
