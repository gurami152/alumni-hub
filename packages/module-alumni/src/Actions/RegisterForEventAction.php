<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\Event;
use Znu\ModuleAlumni\Models\EventRegistration;

class RegisterForEventAction
{
    public function execute(Event $event, int $userId): EventRegistration
    {
        // Check if event is approved and not full
        if ($event->status !== 'approved') {
            throw new \Exception('Event is not available for registration.');
        }

        if ($event->max_participants && $event->registrations()->count() >= $event->max_participants) {
            throw new \Exception('Event has reached maximum capacity.');
        }

        return EventRegistration::firstOrCreate([
            'event_id' => $event->id,
            'user_id' => $userId,
        ], [
            'status' => 'registered',
        ]);
    }
}
