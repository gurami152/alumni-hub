<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\Core\Models\Department;
use Znu\ModuleAlumni\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VacancyApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_vacancies_via_api()
    {
        $dept = Department::create(['name' => 'Test Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        Vacancy::create([
            'author_id' => $user->id,
            'title' => 'Senior Developer',
            'description' => 'Job description',
            'company_name' => 'Tech Corp',
            'department_id' => $dept->id,
        ]);

        $response = $this->actingAs($user)->getJson('/api/v1/alumni/vacancies');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonPath('0.title', 'Senior Developer');
    }

    public function test_can_create_vacancy_via_api()
    {
        $dept = Department::create(['name' => 'Test Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $response = $this->actingAs($user)->postJson('/api/v1/alumni/vacancies', [
            'title' => 'Junior Developer',
            'description' => 'We are hiring',
            'company_name' => 'Startup Inc',
            'location' => 'Kyiv',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('vacancies', [
            'title' => 'Junior Developer',
            'company_name' => 'Startup Inc',
        ]);
    }
}
