<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('name')->get();

        return redirect()->route('catalogo')
        ->with('success', 'Actividad actualizada correctamente.');
    }

    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'image_path' => 'nullable|string|max:255',
        ]);

        Activity::create($data);

        return redirect()->route('catalogo')
        ->with('success', 'Actividad creada correctamente.');
    }

    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'image_path' => 'nullable|string|max:255',
        ]);

        $activity->update($data);

        return redirect()->route('catalogo')
        ->with('success', 'Actividad actualizada correctamente.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('catalogo')
        ->with('success', 'Actividad eliminada correctamente.');
    }

}