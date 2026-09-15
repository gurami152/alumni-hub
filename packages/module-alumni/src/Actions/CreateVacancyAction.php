<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\Vacancy;

class CreateVacancyAction
{
    public function execute(array $data, int $authorId): Vacancy
    {
        return Vacancy::create([
            'author_id' => $authorId,
            'department_id' => $data['department_id'] ?? null,
            'title' => $data['title'],
            'description' => $data['description'],
            'company_name' => $data['company_name'],
            'location' => $data['location'] ?? null,
            'type' => $data['type'] ?? 'full-time',
            'status' => 'pending', // Requires moderation by Career Center
        ]);
    }
}
