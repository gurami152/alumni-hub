<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use Znu\Core\Models\Department;
use App\Models\User;
use Znu\ModuleAlumni\Models\Event;
use Znu\ModuleAlumni\Actions\ModerateEventAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModerateEventActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_moderates_an_event()
    {
        $dept = Department::create(['name' => 'Art Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $event = Event::create([
            'department_id' => $dept->id,
            'author_id' => $user->id,
            'title' => 'Art Exhibition',
            'description' => 'Test',
            'event_date' => now()->addDays(2),
            'status' => 'pending',
        ]);

        $action = new ModerateEventAction();
        $action->execute($event, 'approved');

        $this->assertEquals('approved', $event->status);
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'status' => 'approved',
        ]);
    }
}
