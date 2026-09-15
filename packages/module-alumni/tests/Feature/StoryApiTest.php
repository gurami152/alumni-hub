<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\Core\Models\Department;
use Znu\ModuleAlumni\Models\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoryApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_stories_via_api()
    {
        $dept = Department::create(['name' => 'Test Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        Story::create([
            'department_id' => $dept->id,
            'author_id' => $user->id,
            'title' => 'My Success',
            'content' => 'Hard work pays off',
        ]);

        $response = $this->actingAs($user)->getJson('/api/v1/alumni/stories');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonPath('0.title', 'My Success');
    }

    public function test_can_create_story_via_api()
    {
        $dept = Department::create(['name' => 'Test Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $response = $this->actingAs($user)->postJson('/api/v1/alumni/stories', [
            'title' => 'Graduation 2020',
            'content' => 'Best years of my life',
            'department_id' => $dept->id,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('stories', [
            'title' => 'Graduation 2020',
            'author_id' => $user->id,
        ]);
    }
}
