<?php

namespace Znu\ModuleAlumni\Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Znu\Core\Models\Department;
use Znu\ModuleAlumni\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_events_via_api()
    {
        $dept = Department::create(['name' => 'Test Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        Event::create([
            'department_id' => $dept->id,
            'author_id' => $user->id,
            'title' => 'Alumni Meetup',
            'description' => 'Test event',
            'event_date' => now()->addDays(5),
            'location' => 'Online',
        ]);

        $response = $this->actingAs($user)->getJson('/api/v1/alumni/events');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonPath('0.title', 'Alumni Meetup');
    }

    public function test_can_create_event_via_api()
    {
        $dept = Department::create(['name' => 'Test Faculty']);
        $user = User::factory()->create(['department_id' => $dept->id]);
        
        $response = $this->actingAs($user)->postJson('/api/v1/alumni/events', [
            'title' => 'New Event',
            'description' => 'A great event',
            'event_date' => now()->addDays(10)->toDateString(),
            'location' => 'Campus',
            'is_online' => false,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('events', [
            'title' => 'New Event',
            'author_id' => $user->id,
        ]);
    }
}
