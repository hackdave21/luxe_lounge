<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $temoignages = Temoignage::all();

        return view('frontend.parties.temoignage', compact('temoignages'));
    }
}
