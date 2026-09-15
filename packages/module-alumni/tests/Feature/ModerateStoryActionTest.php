<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use Znu\Core\Models\Department;
use App\Models\User;
use Znu\ModuleAlumni\Models\Story;
use Znu\ModuleAlumni\Actions\ModerateStoryAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModerateStoryActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_moderates_a_story()
    {
        $dept = Department::create(['name' => 'Law Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $story = Story::create([
            'department_id' => $dept->id,
            'author_id' => $user->id,
            'title' => 'Story Title',
            'content' => 'Story Content',
            'status' => 'pending',
        ]);

        $action = new ModerateStoryAction();
        $action->execute($story, 'rejected');

        $this->assertEquals('rejected', $story->status);
        $this->assertDatabaseHas('stories', [
            'id' => $story->id,
            'status' => 'rejected',
        ]);
    }
}
