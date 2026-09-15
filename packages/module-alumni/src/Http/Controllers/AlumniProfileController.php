<?php

namespace Znu\ModuleAlumni\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AlumniProfileController extends Controller
{
    public function index()
    {
        return response()->json(\Znu\ModuleAlumni\Models\AlumniProfile::hierarchicalAccess()->get());
    }

    public function store(\Illuminate\Http\Request $request, \Znu\ModuleAlumni\Actions\RegisterAlumniAction $action)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'department_id' => 'required|exists:departments,id',
            'graduation_year' => 'required|integer',
            'group_number' => 'required|string',
        ]);

        $profile = $action->execute($validated);
        return response()->json($profile, 201);
    }
}
