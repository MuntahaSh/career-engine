<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    /**
     * Upload a new image.
     *
     * Example return:
     * project-thumbnails/1/image.jpg
     */
    public function upload(
        UploadedFile $image,
        string $folder
    ): string {

        return $image->store(
            $folder,
            'public'
        );
    }



    /**
     * Replace old image with new one.
     */
    public function replace(
        ?string $oldPath,
        UploadedFile $newImage,
        string $folder
    ): string {


        // Delete old image
        $this->delete($oldPath);



        // Upload new image
        return $this->upload(
            $newImage,
            $folder
        );
    }




    /**
     * Delete image.
     */
    public function delete(?string $path): void
    {

        if (
            $path &&
            Storage::disk('public')
                ->exists($path)
        ) {

            Storage::disk('public')
                ->delete($path);
        }

    }
}
