<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use Znu\Core\Models\Department;
use App\Models\User;
use Znu\ModuleAlumni\Models\Vacancy;
use Znu\ModuleAlumni\Actions\ModerateVacancyAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModerateVacancyActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_moderates_a_vacancy()
    {
        $dept = Department::create(['name' => 'Economics Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $vacancy = Vacancy::create([
            'department_id' => $dept->id,
            'author_id' => $user->id,
            'title' => 'Economist',
            'description' => 'Job',
            'company_name' => 'Bank',
            'status' => 'pending',
        ]);

        $action = new ModerateVacancyAction();
        $action->execute($vacancy, 'approved');

        $this->assertEquals('approved', $vacancy->status);
        $this->assertDatabaseHas('vacancies', [
            'id' => $vacancy->id,
            'status' => 'approved',
        ]);
    }
}
