<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Certificate;

class CertificatePolicy
{

    /**
     * Anyone can view certificates
     */
    public function view(
        User $user,
        Certificate $certificate
    ): bool
    {
        return true;
    }



    /**
     * Only owner can update
     */

    public function update(
        User $user,
        Certificate $certificate
    ): bool
    {
        return $user->id === $certificate->user_id;
    }



    /**
     * Only owner can delete
     */
    public function delete(
        User $user,
        Certificate $certificate
    ): bool
    {
        return $user->id === $certificate->user_id;
    }

}
