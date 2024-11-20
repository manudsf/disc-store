<?php

namespace App\Http\Controllers;

use App\Models\Disc; // Importa o modelo Disc

class HomeController extends Controller
{
    public function index()
    {
        $discs = Disc::latest()->take(5)->get(); // Busca os três discos mais recentes

        return view('home', compact('discs')); // Envia os discos para a view
    }
}

