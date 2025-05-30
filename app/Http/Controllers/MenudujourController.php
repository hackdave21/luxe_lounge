<?php

namespace App\Http\Controllers;

use App\Models\Menudujour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenudujourController extends Controller
{
    public function index()
    {
        $menus = Menudujour::all();
        return view('admin.menudujours.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menudujours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menus', 'public');
            $data['image'] = $imagePath;
        }

        Menudujour::create($data);

        return redirect()->route('menudujours.index')->with('success', 'Menu du jour ajouté.');
    }

    public function show(string $id)
    {
        $menu = Menudujour::findOrFail($id);
        return view('admin.menudujours.show', compact('menu'));
    }

    public function edit(string $id)
    {
        $menu = Menudujour::findOrFail($id);
        return view('admin.menudujours.edit', compact('menu'));
    }

    public function update(Request $request, string $id)
    {
        $menu = Menudujour::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($menu->image && Storage::disk('public')->exists($menu->image)) {
                Storage::disk('public')->delete($menu->image);
            }

            $imagePath = $request->file('image')->store('menus', 'public');
            $data['image'] = $imagePath;
        }

        $menu->update($data);

        return redirect()->route('menudujours.index')->with('success', 'Menu du jour mis à jour.');
    }

    public function destroy(string $id)
    {
        $menu = Menudujour::findOrFail($id);

        // Supprimer l'image associée si elle existe
        if ($menu->image && Storage::disk('public')->exists($menu->image)) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();
        return redirect()->route('menudujours.index')->with('success', 'Menu supprimé.');
    }
}
