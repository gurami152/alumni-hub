<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\Story;

class CreateStoryAction
{
    public function execute(array $data, int $authorId): Story
    {
        return Story::create([
            'department_id' => $data['department_id'] ?? null,
            'author_id' => $authorId,
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => 'pending', // Requires moderation
        ]);
    }
}
