<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\Core\Models\Department;
use Znu\ModuleAlumni\Models\AlumniProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HierarchicalScopeTest extends TestCase
{
    use RefreshDatabase;

    public function test_faculty_admin_can_only_see_their_department_alumni()
    {
        // 1. Create two departments
        $mathDept = Department::create(['name' => 'Math Faculty']);
        $bioDept = Department::create(['name' => 'Bio Faculty']);

        // 2. Create users (Faculty Admin for Math, and regular Alumni for Bio)
        $mathAdmin = User::factory()->create(['department_id' => $mathDept->id]);
        // Simulate Spatie role or direct permission
        // $mathAdmin->givePermissionTo('manage faculty alumni'); // Assuming permission exists in DB
        
        // Let's mock the 'can' method for the test if Spatie isn't fully seeded in the test DB
        $mathAdmin = \Mockery::mock($mathAdmin)->makePartial();
        $mathAdmin->shouldReceive('can')->with('view_all_department_records')->andReturn(true);

        $bioUser = User::factory()->create(['department_id' => $bioDept->id]);

        // 3. Create Alumni profiles
        AlumniProfile::create([
            'user_id' => $mathAdmin->id,
            'department_id' => $mathDept->id,
            'graduation_year' => 2020,
            'group_number' => 'M-1',
        ]);

        AlumniProfile::create([
            'user_id' => $bioUser->id,
            'department_id' => $bioDept->id,
            'graduation_year' => 2021,
            'group_number' => 'B-1',
        ]);

        // 4. Act: query using scope
        $visibleProfiles = AlumniProfile::hierarchicalAccess($mathAdmin)->get();

        // 5. Assert: Math admin should only see 1 profile (Math)
        $this->assertCount(1, $visibleProfiles);
        $this->assertEquals($mathDept->id, $visibleProfiles->first()->department_id);
    }
}
