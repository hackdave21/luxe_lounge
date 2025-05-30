<?php

namespace App\Http\Controllers;

use App\Models\Cuisinier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CuisinierController extends Controller
{
    public function index()
    {
        $cuisiniers = Cuisinier::all();
        return view('admin.cuisiniers.index', compact('cuisiniers'));
    }

    public function create()
    {
        return view('admin.cuisiniers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'experience' => 'nullable|integer|min:0',
            'distinctions' => 'nullable|string'
        ]);

        $data = $request->all();

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('cuisiniers', 'public');
            $data['photo'] = $photoPath;
        }

        Cuisinier::create($data);

        return redirect()->route('cuisiniers.index')->with('success', 'Cuisinier ajouté avec succès.');
    }

    public function show(string $id)
    {
        $cuisinier = Cuisinier::findOrFail($id);
        return view('admin.cuisiniers.show', compact('cuisinier'));
    }

    public function edit(string $id)
    {
        $cuisinier = Cuisinier::findOrFail($id);
        return view('admin.cuisiniers.edit', compact('cuisinier'));
    }

    public function update(Request $request, string $id)
    {
        $cuisinier = Cuisinier::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'experience' => 'nullable|integer|min:0',
            'distinctions' => 'nullable|string'
        ]);

        $data = $request->all();

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($cuisinier->photo && Storage::disk('public')->exists($cuisinier->photo)) {
                Storage::disk('public')->delete($cuisinier->photo);
            }

            $photoPath = $request->file('photo')->store('cuisiniers', 'public');
            $data['photo'] = $photoPath;
        }

        $cuisinier->update($data);

        return redirect()->route('cuisiniers.index')->with('success', 'Cuisinier mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $cuisinier = Cuisinier::findOrFail($id);

        // Supprimer la photo associée si elle existe
        if ($cuisinier->photo && Storage::disk('public')->exists($cuisinier->photo)) {
            Storage::disk('public')->delete($cuisinier->photo);
        }

        $cuisinier->delete();
        return redirect()->route('cuisiniers.index')->with('success', 'Cuisinier supprimé avec succès.');
    }
}
