<?php

namespace App\Http\Controllers;

use App\DTOs\BioData;
use App\Http\Requests\GenerateBioRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\ActivityService;
use App\Services\AI\AIService;
use App\Services\ProfileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;


class ProfileController extends Controller
{
    /**
     * Business logic.
     */
    protected ProfileService $profileService;
    private ActivityService $activityService;


    /**
     * Inject the service.
     */
    public function __construct(ProfileService $profileService, ActivityService $activityService)
    {
        $this->profileService = $profileService;
        $this->activityService = $activityService;
    }

    /**
     * ------------------------------------------------------------
     * Display Profile Page
     * ------------------------------------------------------------
     *
     * Only returns the page.
     * Never update the database here.
     */
    public function edit(): View
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }

    /**
     * ------------------------------------------------------------
     * Update Profile
     * ------------------------------------------------------------
     *
     * Flow:
     *
     * 1 Validate Request
     * 2 Call Service
     * 3 Redirect Back
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->profileService->update(
            auth()->user(),
            $request->validated(),
            $request->file('profile_photo')
        );
        $this->activityService->create(

            auth()->user(),

            'profile_photo_added',

            'Added profile photo',

            'Updated profile appearance',

            'photo'

        );

        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }




    public function generateBio(
        GenerateBioRequest $request,
        AIService $aiService
    ): JsonResponse {


        $user = auth()->user();



        $required = [

            'target_role' => $user->target_role,

            'degree' => $user->degree,

            'field_of_study' => $user->field_of_study,

            'university' => $user->university,

        ];



        foreach ($required as $field => $value) {

            if (blank($value)) {

                return response()->json([

                    'message' => "Please complete your {$field} before generating a bio."

                ], 422);
            }
        }



        if (empty($user->technologies_used)) {

            return response()->json([

                'message' => 'Please add your technologies before generating a bio.'

            ], 422);
        }



        try {


            $data = new BioData(

                name: $user->name,

                yearsExperience: $user->years_experience ?? 0,

                technologies: $user->technologies_used,

                degree: $user->degree,

                fieldOfStudy: $user->field_of_study,

                university: $user->university,

                graduationYear: $user->graduation_year,

                location: $user->location,

                targetRole: $user->target_role,

                github: $user->github_username,

                linkedin: $user->linkedin_url,

                portfolio: $user->portfolio_url,

                website_url: $user->website_url

            );



            $bio = $aiService->generateBio(
                $data->toArray()
            );



            return response()->json([

                'bio' => $bio

            ]);
        } catch (\Throwable $e) {

            return response()->json([

                'message' => $e->getMessage(),

                'line' => $e->getLine(),

                'file' => $e->getFile()

            ], 500);
        }
    }
}
