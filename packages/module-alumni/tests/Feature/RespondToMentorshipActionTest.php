<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\ModuleAlumni\Models\MentorshipRequest;
use Znu\ModuleAlumni\Actions\RespondToMentorshipAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RespondToMentorshipActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_responds_to_mentorship()
    {
        $author = User::factory()->create();
        $assignee = User::factory()->create();
        
        $request = MentorshipRequest::create([
            'author_id' => $author->id,
            'title' => 'Help Request',
            'status' => 'open',
            'description' => 'Help me',
            'type' => 'find_mentor',
        ]);

        $action = new RespondToMentorshipAction();
        $action->execute($request, $assignee->id);

        $this->assertEquals('in_progress', $request->status);
        $this->assertEquals($assignee->id, $request->assignee_id);
        $this->assertDatabaseHas('mentorship_requests', [
            'id' => $request->id,
            'status' => 'in_progress',
            'assignee_id' => $assignee->id,
        ]);
    }
}
