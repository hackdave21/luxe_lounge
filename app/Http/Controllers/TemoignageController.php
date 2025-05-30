<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemoignageController extends Controller
{
    public function index()
    {
        $temoignages = Temoignage::all();
        return view('admin.temoignages.index', compact('temoignages'));
    }

    public function create()
    {
        return view('admin.temoignages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'profession' => 'required',
            'message' => 'nullable',
        ]);

        $data = $request->all();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('temoignages', 'public');
            $data['image'] = $imagePath;
        }

        Temoignage::create($data);
        return redirect()->route('temoignages.index')->with('success', 'temoignage créé avec succès.');
    }

    public function show(string $id)
    {
        $temoignage = Temoignage::findOrFail($id);
        return view('admin.temoignages.show', compact('temoignage'));
    }

    public function edit(string $id)
    {
        $temoignage = Temoignage::findOrFail($id);
        return view('admin.temoignages.edit', compact('temoignage'));
    }

    public function update(Request $request, string $id)
    {
        $temoignage = Temoignage::findOrFail($id);

        $request->validate([
           'nom' => 'required',
            'profession' => 'required',
            'message' => 'nullable',
        ]);

        $data = $request->all();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($temoignage->image && Storage::disk('public')->exists($temoignage->image)) {
                Storage::disk('public')->delete($temoignage->image);
            }

            $imagePath = $request->file('image')->store('temoignages', 'public');
            $data['image'] = $imagePath;
        }

        $temoignage->update($data);
        return redirect()->route('temoignages.index')->with('success', 'temoignage mis à jour.');
    }

    public function destroy(string $id)
    {
        $temoignage = Temoignage::findOrFail($id);

        // Supprimer l'image associée
        if ($temoignage->image && Storage::disk('public')->exists($temoignage->image)) {
            Storage::disk('public')->delete($temoignage->image);
        }

        $temoignage->delete();
        return redirect()->route('temoignages.index')->with('success', 'temoignage supprimé.');
    }
}
