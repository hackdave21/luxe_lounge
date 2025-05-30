<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlatController extends Controller
{
    public function index()
    {
        $plats = Plat::with('categorie')->get();
        return view('admin.plats.index', compact('plats'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('admin.plats.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'description' => 'nullable',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plats', 'public');
            $data['image'] = $imagePath;
        }

        Plat::create($data);
        return redirect()->route('plats.index')->with('success', 'Plat créé avec succès.');
    }

    public function show(string $id)
    {
        $plat = Plat::with('categorie')->findOrFail($id);
        $categories = Categorie::all();
        return view('admin.plats.show', compact('plat', 'categories'));
    }

    public function edit(string $id)
    {
        $plat = Plat::findOrFail($id);
        $categories = Categorie::all();
        return view('admin.plats.edit', compact('plat', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $plat = Plat::findOrFail($id);

        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'description' => 'nullable',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($plat->image && Storage::disk('public')->exists($plat->image)) {
                Storage::disk('public')->delete($plat->image);
            }

            $imagePath = $request->file('image')->store('plats', 'public');
            $data['image'] = $imagePath;
        }

        $plat->update($data);
        return redirect()->route('plats.index')->with('success', 'Plat mis à jour.');
    }

    public function destroy(string $id)
    {
        $plat = Plat::findOrFail($id);

        // Supprimer l'image associée
        if ($plat->image && Storage::disk('public')->exists($plat->image)) {
            Storage::disk('public')->delete($plat->image);
        }

        $plat->delete();
        return redirect()->route('plats.index')->with('success', 'Plat supprimé.');
    }
}
