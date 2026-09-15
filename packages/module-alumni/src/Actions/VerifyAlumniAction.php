<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\AlumniProfile;
use Illuminate\Support\Facades\Gate;

class VerifyAlumniAction
{
    public function execute(AlumniProfile $profile, string $status = 'verified'): AlumniProfile
    {
        // Optional: you can authorize this via policy here or in the controller
        // Gate::authorize('verify', $profile);

        $profile->update([
            'status' => $status, // e.g., 'verified' or 'rejected'
        ]);

        // Here we could also trigger an event/notification to the user
        // event(new AlumniVerified($profile));

        return $profile;
    }
}
