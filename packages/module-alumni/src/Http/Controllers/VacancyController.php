<?php

namespace Znu\ModuleAlumni\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VacancyController extends Controller
{
    public function index()
    {
        return response()->json(\Znu\ModuleAlumni\Models\Vacancy::hierarchicalAccess()->get());
    }

    public function store(\Illuminate\Http\Request $request, \Znu\ModuleAlumni\Actions\CreateVacancyAction $action)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'company_name' => 'required|string',
            'location' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        $vacancy = $action->execute($validated, auth()->id());
        return response()->json($vacancy, 201);
    }
}
