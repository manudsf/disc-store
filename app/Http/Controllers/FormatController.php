<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formats = \App\Models\Format::all(); // Recupera todos os formatos
        return view('formats.index', compact('formats')); // Envia para a view
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('formats.create'); // Exibe o formulário de criação
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validação
        ]);
    
        \App\Models\Format::create($request->all()); // Salva no banco
    
        return redirect()->route('formats.index')->with('success', 'Formato criado com sucesso!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Format $format)
{
    return view('formats.show', compact('format')); // Exibe os detalhes do formato
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Format $format)
    {
        return view('formats.edit', compact('format')); // Exibe o formulário de edição
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Format $format)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validação
        ]);
    
        $format->update($request->all()); // Atualiza os dados
    
        return redirect()->route('formats.index')->with('success', 'Formato atualizado com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Format $format)
    {
        $format->delete(); // Exclui o formato
    
        return redirect()->route('formats.index')->with('success', 'Formato excluído com sucesso!');
    }
    
}
