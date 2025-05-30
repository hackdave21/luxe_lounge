<?php

namespace App\Http\Controllers;

use App\Models\Cuisinier;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function equipe()
    {
        // Récupérer tous les cuisiniers pour les afficher sur la page d'équipe
        $cuisiniers = Cuisinier::all();
        return view('equipe', compact('cuisiniers'));
    }
}
