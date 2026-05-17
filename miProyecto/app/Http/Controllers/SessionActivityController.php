<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SessionActivity;
use App\Models\Activity;
use App\Models\Installation;
use Illuminate\Http\Request;

class SessionActivityController extends Controller
{
    public function index()
    {
        return redirect()->route('catalogo');
    }

    public function edit(SessionActivity $session)
    {
        $activities = Activity::orderBy('name')->get();

        $installations = Installation::orderBy('name')->get();

        return view('admin.sessions.edit', compact('session', 'activities', 'installations'));
    }

    public function update(Request $request, SessionActivity $session)
    {
        $validated = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'installation_id' => 'required|exists:installations,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $session->update($validated);
        return redirect()->route('admin.sessions.index')->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(SessionActivity $session)
    {
        $session->delete();
        return redirect()->route('admin.sessions.index')->with('success', 'Horario eliminado correctamente.');  
    }

    public function create(Request $request)
    {
        $activities = Activity::orderBy('name')->get();
        $installations = Installation::orderBy('name')->get();

        $selectedActivityId = $request->query('activity_id');

        return view('admin.sessions.create', compact(
            'activities',
            'installations',
            'selectedActivityId'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'installation_id' => 'required|exists:installations,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        SessionActivity::create($validated);

        return redirect()->route('activities.show', $validated['activity_id'])
            ->with('success', 'Sesión añadida correctamente.');
    }

}