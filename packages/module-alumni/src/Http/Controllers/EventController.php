<?php

namespace Znu\ModuleAlumni\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(\Znu\ModuleAlumni\Models\Event::hierarchicalAccess()->get());
    }

    public function store(\Illuminate\Http\Request $request, \Znu\ModuleAlumni\Actions\CreateEventAction $action)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string',
            'is_online' => 'boolean',
            'language' => 'string',
            'max_participants' => 'nullable|integer',
        ]);

        $event = $action->execute($validated, auth()->id());
        return response()->json($event, 201);
    }

    public function register(\Znu\ModuleAlumni\Models\Event $event, \Znu\ModuleAlumni\Actions\RegisterForEventAction $action)
    {
        try {
            $registration = $action->execute($event, auth()->id());
            return response()->json($registration, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
