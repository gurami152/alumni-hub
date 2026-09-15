<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\MentorshipRequest;

class CreateMentorshipRequestAction
{
    public function execute(array $data, int $authorId): MentorshipRequest
    {
        return MentorshipRequest::create([
            'author_id' => $authorId,
            'title' => $data['title'],
            'description' => $data['description'],
            'type' => $data['type'],
            'deadline' => $data['deadline'] ?? null,
            'status' => 'open',
            'hours_spent' => 0,
        ]);
    }
}
