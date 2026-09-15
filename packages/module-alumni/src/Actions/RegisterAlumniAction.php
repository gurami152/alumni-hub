<?php

namespace Znu\ModuleAlumni\Actions;

use App\Models\User;
use Znu\ModuleAlumni\Models\AlumniProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterAlumniAction
{
    public function execute(array $data): AlumniProfile
    {
        return DB::transaction(function () use ($data) {
            // Create the base user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'password' => Hash::make($data['password']),
            ]);

            // Assign basic Alumni role
            $user->assignRole('Alumni');

            // Create the Alumni Profile
            $profile = AlumniProfile::create([
                'user_id' => $user->id,
                'department_id' => $data['department_id'],
                'specialty' => $data['specialty'] ?? null,
                'graduation_year' => $data['graduation_year'],
                'group_number' => $data['group_number'],
                'maiden_name' => $data['maiden_name'] ?? null,
                'current_job' => $data['current_job'] ?? null,
                'enrollment_year' => $data['enrollment_year'] ?? null,
                'education_level' => $data['education_level'] ?? null,
                'awards_state' => $data['awards_state'] ?? null,
                'awards_other' => $data['awards_other'] ?? null,
                'contact_preferences' => $data['contact_preferences'] ?? [],
                'suggestions' => $data['suggestions'] ?? null,
                'social_links' => $data['social_links'] ?? [],
                'status' => 'pending', // Requires verification by Faculty Admin
                'privacy_show_profile' => $data['privacy_show_profile'] ?? true,
            ]);

            return $profile;
        });
    }
}
