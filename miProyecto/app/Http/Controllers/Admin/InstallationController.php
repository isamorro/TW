<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Installation;
use Illuminate\Http\Request;

class InstallationController extends Controller
{
    public function index()
    {
        $installations = Installation::orderBy('name')->get();

        return view('instalaciones', compact('installations'));
    }

    public function create()
    {
        return view('admin.installations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string|max:255',
            'status' => 'required|in:available,maintenance',
        ]);

        Installation::create($data);

        return redirect()->route('instalaciones')
            ->with('success', 'Instalación creada correctamente.');
    }

    public function edit(Installation $installation)
    {
        return view('admin.installations.edit', compact('installation'));
    }

    public function update(Request $request, Installation $installation)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string|max:255',
            'status' => 'required|in:available,maintenance',
        ]);

        $installation->update($data);

        return redirect()->route('instalaciones')
            ->with('success', 'Instalación actualizada correctamente.');
    }

    public function destroy(Installation $installation)
    {
        $installation->delete();

        return redirect()->route('instalaciones')
            ->with('success', 'Instalación eliminada correctamente.');
    }
}