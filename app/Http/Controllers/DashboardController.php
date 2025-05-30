<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Cuisinier;
use App\Models\Menudujour;
use App\Models\Plat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
           // Récupérer les elements
           $categories = Categorie::all();
           $plats = Plat::all();
           $menudujours = Menudujour::all();
           $cuisiniers = Cuisinier::all();

           // Passer les données à la vue
           return view('admin.dashboard', compact('categories', 'plats', 'menudujours', 'cuisiniers'));
    }
}
