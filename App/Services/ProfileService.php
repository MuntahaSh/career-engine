<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ProfileService
{
    /**
     * Image service.
     */
    protected ImageUploadService $imageService;

    /**
     * Inject dependency.
     */
    public function __construct(
        ImageUploadService $imageService
    ) {
        $this->imageService = $imageService;
    }

    /**
     * ----------------------------------------------------------
     * Update Profile
     * ----------------------------------------------------------
     *
     * Handles:
     *
     * - Updating user data
     * - Uploading profile image
     * - Updating timestamps
     * - Database transaction
     */
    public function update(

        User $user,

        array $data,

        ?UploadedFile $photo

    ): User {

        return DB::transaction(function () use (

            $user,

            $data,

            $photo

        ) {

            /*
            |--------------------------------------------------------------------------
            | Upload image
            |--------------------------------------------------------------------------
            */

            if ($photo) {

                $data['profile_photo_path'] =

                    $this->imageService
                        ->replace(

                            $user->profile_photo_path,

                            $photo,

                            'profile_photos'

                        );

            }

            /*
            |--------------------------------------------------------------------------
            | Update profile timestamp
            |--------------------------------------------------------------------------
            */

            $data['last_profile_updated_at'] = now();

            /*
            |--------------------------------------------------------------------------
            | Profile completed?
            |--------------------------------------------------------------------------
            */

            if (

                is_null($user->profile_completed_at)

                &&

                $this->isCompleted($user, $data)

            ) {

                $data['profile_completed_at'] = now();

            }

            /*
            |--------------------------------------------------------------------------
            | Save
            |--------------------------------------------------------------------------
            */

            if(isset($data['technologies_used']))
{
    $data['technologies_used'] =
        array_values($data['technologies_used']);
}


$user->update($data);

            /*
            |--------------------------------------------------------------------------
            | Return fresh model
            |--------------------------------------------------------------------------
            */

            return $user->fresh();
        });
    }

    /**
     * ----------------------------------------------------------
     * Determine whether profile is complete.
     * ----------------------------------------------------------
     */
private function isCompleted(
    User $user,
    array $data
): bool {

   return

filled($data['name'] ?? $user->name)

&&

filled($data['target_role'] ?? $user->target_role)

&&

filled($data['bio'] ?? $user->bio)

&&

filled($data['location'] ?? $user->location)

&&

filled($data['university'] ?? $user->university)

&&

filled($data['degree'] ?? $user->degree)

&&

filled($data['field_of_study'] ?? $user->field_of_study)

&&

filled($data['technologies_used'] ?? $user->technologies_used);
}
}
