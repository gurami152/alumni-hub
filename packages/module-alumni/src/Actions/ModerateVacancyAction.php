<?php

namespace Znu\ModuleAlumni\Actions;

use Znu\ModuleAlumni\Models\Vacancy;

class ModerateVacancyAction
{
    public function execute(Vacancy $vacancy, string $status): Vacancy
    {
        $vacancy->update([
            'status' => $status, // 'approved', 'rejected'
        ]);

        return $vacancy;
    }
}
