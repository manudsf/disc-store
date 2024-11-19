<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = \App\Models\Artist::all(); // Busca todos os artistas
        return view('artists.index', compact('artists')); // Retorna a view com os dados
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('artists.create'); // Retorna o formulário de criação
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255', // Validação
    ]);

    \App\Models\Artist::create($request->all()); // Salva no banco

    return redirect()->route('artists.index')->with('success', 'Artista criado com sucesso!');
}


    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Artist $artist)
{
    return view('artists.show', compact('artist')); // Exibe o artista
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Artist $artist)
    {
        return view('artists.edit', compact('artist')); // Formulário de edição
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Artist $artist)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validação
        ]);
    
        $artist->update($request->all()); // Atualiza os dados
    
        return redirect()->route('artists.index')->with('success', 'Artista atualizado com sucesso!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Artist $artist)
{
    $artist->delete(); // Exclui o artista

    return redirect()->route('artists.index')->with('success', 'Artista excluído com sucesso!');
}

}
