<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\ModuleAlumni\Models\AlumniProfile;
use Znu\ModuleAlumni\Actions\UpdateAlumniPrivacyAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateAlumniPrivacyActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_updates_privacy()
    {
        $dept = \Znu\Core\Models\Department::create(['name' => 'Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $profile = AlumniProfile::create([
            'user_id' => $user->id,
            'department_id' => $dept->id,
            'graduation_year' => 2020,
            'group_number' => '123',
            'privacy_show_profile' => true,
        ]);

        $action = new UpdateAlumniPrivacyAction();
        $action->execute($profile, false);

        $this->assertFalse($profile->privacy_show_profile);
        $this->assertDatabaseHas('alumni_profiles', [
            'id' => $profile->id,
            'privacy_show_profile' => false,
        ]);
    }
}
