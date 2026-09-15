<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use Znu\Core\Models\Department;
use Znu\ModuleAlumni\Models\Event;
use App\Models\User;
use Znu\ModuleAlumni\Actions\CreateEventAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateEventActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_an_event_and_assigns_department()
    {
        $dept = Department::create(['name' => 'Science Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        $action = new CreateEventAction();
        
        $data = [
            'department_id' => $dept->id,
            'title' => 'Science Fair',
            'description' => 'A great event',
            'event_date' => now()->addDays(2),
            'location' => 'Main Hall',
        ];

        $event = $action->execute($data, $user->id);

        $this->assertInstanceOf(Event::class, $event);
        $this->assertEquals('Science Fair', $event->title);
        $this->assertEquals($dept->id, $event->department_id); // the action should assign the user's department_id

        $this->assertDatabaseHas('events', [
            'title' => 'Science Fair',
            'author_id' => $user->id,
            'department_id' => $dept->id,
        ]);
    }
}
