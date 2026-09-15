<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\ModuleAlumni\Models\Event;
use Znu\ModuleAlumni\Models\EventRegistration;
use Znu\ModuleAlumni\Actions\RegisterForEventAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterForEventActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_registers_user_for_event()
    {
        $user = User::factory()->create();
        $event = Event::create([
            'author_id' => User::factory()->create()->id,
            'title' => 'Test Event',
            'description' => 'Test',
            'event_date' => now()->addDays(1),
            'max_participants' => 10,
            'status' => 'approved',
        ]);

        $action = new RegisterForEventAction();
        $registration = $action->execute($event, $user->id);

        $this->assertInstanceOf(EventRegistration::class, $registration);
        $this->assertEquals($user->id, $registration->user_id);
        $this->assertEquals($event->id, $registration->event_id);

        $this->assertDatabaseHas('event_registrations', [
            'event_id' => $event->id,
            'user_id' => $user->id,
        ]);
    }
}
