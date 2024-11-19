<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca todos os gêneros do banco de dados
        $genres = \App\Models\Genre::all();
    
        // Retorna a view com os dados
        return view('genres.index', compact('genres'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida os dados
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Cria o gênero
        \App\Models\Genre::create($request->all());
    
        // Redireciona para a lista de gêneros com uma mensagem de sucesso
        return redirect()->route('genres.index')->with('success', 'Gênero criado com sucesso!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Genre $genre)
{
    return view('genres.show', compact('genre'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Genre $genre)
{
    return view('genres.edit', compact('genre'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Genre $genre)
{
    // Valida os dados
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Atualiza o gênero
    $genre->update($request->all());

    // Redireciona para a lista de gêneros com uma mensagem de sucesso
    return redirect()->route('genres.index')->with('success', 'Gênero atualizado com sucesso!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Genre $genre)
    {
        $genre->delete();
    
        // Redireciona para a lista de gêneros com uma mensagem de sucesso
        return redirect()->route('genres.index')->with('success', 'Gênero excluído com sucesso!');
    }
    
}
