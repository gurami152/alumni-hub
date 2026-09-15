<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\AlumniProfile;

class UpdateAlumniPrivacyAction
{
    public function execute(AlumniProfile $profile, bool $showProfile): AlumniProfile
    {
        $profile->update([
            'privacy_show_profile' => $showProfile,
        ]);

        return $profile;
    }
}
