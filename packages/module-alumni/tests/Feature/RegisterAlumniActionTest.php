<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use Znu\Core\Models\Department;
use Znu\ModuleAlumni\Models\AlumniProfile;
use App\Models\User;
use Znu\ModuleAlumni\Actions\RegisterAlumniAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterAlumniActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_user_and_alumni_profile()
    {
        \Spatie\Permission\Models\Role::create(['name' => 'Alumni']);
        $dept = Department::create(['name' => 'IT Faculty']);
        $action = new RegisterAlumniAction();
        
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'secret123',
            'department_id' => $dept->id,
            'graduation_year' => 2021,
            'group_number' => 'IT-1',
        ];

        $profile = $action->execute($data);

        $this->assertInstanceOf(AlumniProfile::class, $profile);
        $this->assertEquals(2021, $profile->graduation_year);
        $this->assertEquals('IT-1', $profile->group_number);

        $this->assertDatabaseHas('users', [
            'email' => 'john.doe@example.com',
            'name' => 'John Doe',
        ]);

        $this->assertDatabaseHas('alumni_profiles', [
            'department_id' => $dept->id,
            'graduation_year' => 2021,
            'group_number' => 'IT-1',
            'user_id' => $profile->user_id, // ensure user_id matches
        ]);
    }
}
