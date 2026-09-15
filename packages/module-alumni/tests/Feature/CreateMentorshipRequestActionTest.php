<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use Znu\Core\Models\Department;
use App\Models\User;
use Znu\ModuleAlumni\Models\MentorshipRequest;
use Znu\ModuleAlumni\Actions\CreateMentorshipRequestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMentorshipRequestActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_mentorship_request()
    {
        $dept = Department::create(['name' => 'IT Faculty']);
        $author = User::factory()->create(['department_id' => $dept->id]);
        $assignee = User::factory()->create(['department_id' => $dept->id]);
        
        $action = new CreateMentorshipRequestAction();
        $data = [
            'department_id' => $dept->id,
            'title' => 'Mentorship Request',
            'description' => 'I need a mentor',
            'type' => 'find_mentor',
        ];

        $request = $action->execute($data, $author->id);

        $this->assertInstanceOf(MentorshipRequest::class, $request);
        $this->assertEquals($author->id, $request->author_id);
        $this->assertNull($request->assignee_id);
        $this->assertEquals('open', $request->status);

        $this->assertDatabaseHas('mentorship_requests', [
            'author_id' => $author->id,
            'status' => 'open',
        ]);
    }
}
