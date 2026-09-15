<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\Event;

class ModerateEventAction
{
    public function execute(Event $event, string $status): Event
    {
        $event->update([
            'status' => $status, // 'approved', 'rejected'
        ]);

        // Trigger notification to the author
        
        return $event;
    }
}
