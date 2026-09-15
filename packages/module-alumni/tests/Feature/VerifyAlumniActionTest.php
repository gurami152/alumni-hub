<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\ModuleAlumni\Models\AlumniProfile;
use Znu\ModuleAlumni\Actions\VerifyAlumniAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VerifyAlumniActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_verifies_alumni()
    {
        $dept = \Znu\Core\Models\Department::create(['name' => 'Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $profile = AlumniProfile::create([
            'user_id' => $user->id,
            'department_id' => $dept->id,
            'graduation_year' => 2020,
            'group_number' => '123',
            'status' => 'pending',
        ]);

        $action = new VerifyAlumniAction();
        
        // Use Mockery to bypass Gate check if needed or just assign role
        $action->execute($profile);

        $this->assertEquals('verified', $profile->status);
        $this->assertDatabaseHas('alumni_profiles', [
            'id' => $profile->id,
            'status' => 'verified',
        ]);
    }
}
