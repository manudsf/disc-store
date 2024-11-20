<?php

namespace App\Http\Controllers;

use App\Models\Disc; 

class HomeController extends Controller
{
    public function index()
    {
        $discs = Disc::latest()->take(5)->get(); 

        return view('home', compact('discs')); 
    }
}

