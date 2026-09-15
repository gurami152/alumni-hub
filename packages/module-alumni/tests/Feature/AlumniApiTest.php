<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\Core\Models\Department;
use Znu\ModuleAlumni\Models\AlumniProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlumniApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_alumni_profiles_via_api()
    {
        // 1. Setup user and department
        $dept = Department::create(['name' => 'IT Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        AlumniProfile::create([
            'user_id' => $user->id,
            'department_id' => $dept->id,
            'graduation_year' => 2022,
            'group_number' => 'IT-1',
        ]);

        // 2. Act: Call the API endpoint as authenticated user
        $response = $this->actingAs($user)->getJson('/api/v1/alumni/profiles');

        // 3. Assert: Verify response
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonPath('0.group_number', 'IT-1');
    }
}
