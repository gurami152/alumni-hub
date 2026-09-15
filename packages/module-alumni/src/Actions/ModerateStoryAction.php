<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\Story;

class ModerateStoryAction
{
    public function execute(Story $story, string $status): Story
    {
        $story->update([
            'status' => $status, // 'approved', 'rejected'
        ]);

        return $story;
    }
}
