<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\Event;

class CreateEventAction
{
    public function execute(array $data, int $authorId): Event
    {
        return Event::create([
            'author_id' => $authorId,
            'department_id' => $data['department_id'] ?? null,
            'title' => $data['title'],
            'description' => $data['description'],
            'event_date' => $data['event_date'],
            'location' => $data['location'] ?? null,
            'is_online' => $data['is_online'] ?? false,
            'language' => $data['language'] ?? 'uk',
            'status' => 'pending', // Requires moderation
            'max_participants' => $data['max_participants'] ?? null,
        ]);
    }
}
