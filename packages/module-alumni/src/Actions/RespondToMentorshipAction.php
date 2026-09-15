<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\MentorshipRequest;

class RespondToMentorshipAction
{
    public function execute(MentorshipRequest $request, int $assigneeId): MentorshipRequest
    {
        if ($request->status !== 'open') {
            throw new \Exception('Mentorship request is no longer open.');
        }

        $request->update([
            'assignee_id' => $assigneeId,
            'status' => 'in_progress',
        ]);

        return $request;
    }
}
