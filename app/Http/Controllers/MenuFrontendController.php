<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Plat;
use Illuminate\Http\Request;

class MenuFrontendController extends Controller
{
    public function index()
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();

        // Récupérer tous les plats avec leurs catégories
        $plats = Plat::with('categorie')->get();

        return view('frontend.parties.pages.menu', compact('categories', 'plats'));
    }
}
