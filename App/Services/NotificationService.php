<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\AddProfilePhotoNotification;
use App\Notifications\CompleteProfileNotification;
use App\Notifications\WelcomeNotification;

class NotificationService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function sendWelcome(User $user): void
    {

        $user->notify(
            new WelcomeNotification(),

        );
    }



public function checkProfilePhotoNotifications(User $user): void
{
    // User already has a profile photo
    if (! empty($user->profile_photo_path)) {
        return;
    }

    // Notification was already sent
    $alreadySent = $user->notifications()
        ->where('type', AddProfilePhotoNotification::class)
        ->exists();

    if ($alreadySent) {
        return;
    }

    // Send notification
    $user->notify(
        new AddProfilePhotoNotification()
    );
}

public function checkProfileCompletion(User $user): void
{
    $completion = $this->calculateProfileCompletion($user);


    // Only remind users who are almost finished.
  if ($completion >= 100) {
    return;
}

    $alreadySent = $user->notifications()
        ->where('type', CompleteProfileNotification::class)
        ->exists();

    if ($alreadySent) {
        return;
    }

 $user->notify(
    new CompleteProfileNotification($completion)
);
}

private function calculateProfileCompletion(User $user): int
{
    $score = 0;

    if ($user->profile_photo) {
        $score += 15;
    }

    if (! empty($user->bio)) {
        $score += 15;
    }

    if ($user->skills()->exists()) {
        $score += 20;
    }

    if ($user->projects()->exists()) {
        $score += 20;
    }

    if ($user->experiences()->exists()) {
        $score += 15;
    }

    if ($user->certificates()->exists()) {
        $score += 15;
    }

    return min($score, 100);
}
}
