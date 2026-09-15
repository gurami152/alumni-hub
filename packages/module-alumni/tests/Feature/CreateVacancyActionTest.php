<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use Znu\Core\Models\Department;
use Znu\ModuleAlumni\Models\Vacancy;
use App\Models\User;
use Znu\ModuleAlumni\Actions\CreateVacancyAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateVacancyActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_vacancy()
    {
        $dept = Department::create(['name' => 'Business Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        $action = new CreateVacancyAction();
        
        $data = [
            'department_id' => $dept->id,
            'title' => 'Marketing Manager',
            'description' => 'Exciting role',
            'company_name' => 'Ad Agency',
            'location' => 'Remote',
        ];

        $vacancy = $action->execute($data, $user->id);

        $this->assertInstanceOf(Vacancy::class, $vacancy);
        $this->assertEquals('Marketing Manager', $vacancy->title);
        $this->assertEquals($dept->id, $vacancy->department_id);

        $this->assertDatabaseHas('vacancies', [
            'title' => 'Marketing Manager',
            'author_id' => $user->id,
            'department_id' => $dept->id,
        ]);
    }
}
