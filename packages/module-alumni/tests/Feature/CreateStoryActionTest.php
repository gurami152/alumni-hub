<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use Znu\Core\Models\Department;
use App\Models\User;
use Znu\ModuleAlumni\Models\Story;
use Znu\ModuleAlumni\Actions\CreateStoryAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStoryActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_story()
    {
        $dept = Department::create(['name' => 'Law Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $action = new CreateStoryAction();
        $data = [
            'department_id' => $dept->id,
            'title' => 'My first case',
            'content' => 'It was amazing',
        ];

        $story = $action->execute($data, $user->id);

        $this->assertInstanceOf(Story::class, $story);
        $this->assertEquals('My first case', $story->title);
        $this->assertEquals('pending', $story->status);

        $this->assertDatabaseHas('stories', [
            'author_id' => $user->id,
            'title' => 'My first case',
            'status' => 'pending',
        ]);
    }
}
