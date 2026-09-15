<?php

namespace Znu\ModuleAlumni\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StoryController extends Controller
{
    public function index()
    {
        return response()->json(\Znu\ModuleAlumni\Models\Story::hierarchicalAccess()->get());
    }

    public function store(\Illuminate\Http\Request $request, \Znu\ModuleAlumni\Actions\CreateStoryAction $action)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'department_id' => 'nullable|exists:departments,id',
        ]);

        $story = $action->execute($validated, auth()->id());
        return response()->json($story, 201);
    }
}
