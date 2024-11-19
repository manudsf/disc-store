<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disc;
use Illuminate\Support\Facades\Storage;

class DiscController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discs = Disc::with(['genre', 'artist', 'format'])->get(); // Carrega os relacionamentos
        return view('discs.index', compact('discs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = \App\Models\Genre::all();   // Todos os gêneros
        $artists = \App\Models\Artist::all(); // Todos os artistas
        $formats = \App\Models\Format::all(); // Todos os formatos
    
        return view('discs.create', compact('genres', 'artists', 'formats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'genre_id' => 'required|exists:genres,id',
            'artist_id' => 'required|exists:artists,id',
            'format_id' => 'required|exists:formats,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
        ]);

        // Lidar com upload de imagem
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public'); // Salva no disco "public" na pasta "covers"
            $validatedData['cover_image'] = $path;
        }

        Disc::create($validatedData);

        return redirect()->route('discs.index')->with('success', 'Disco criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disc $disc)
    {
        $disc->load(['genre', 'artist', 'format']); // Carrega os relacionamentos
        return view('discs.show', compact('disc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disc $disc)
    {
        $genres = \App\Models\Genre::all();
        $artists = \App\Models\Artist::all();
        $formats = \App\Models\Format::all();

        return view('discs.edit', compact('disc', 'genres', 'artists', 'formats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disc $disc)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'genre_id' => 'required|exists:genres,id',
            'artist_id' => 'required|exists:artists,id',
            'format_id' => 'required|exists:formats,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
        ]);

        // Lidar com upload de nova imagem
        if ($request->hasFile('cover_image')) {
            // Exclui a imagem antiga, se existir
            if ($disc->cover_image) {
                Storage::disk('public')->delete($disc->cover_image);
            }

            $path = $request->file('cover_image')->store('covers', 'public'); // Salva a nova imagem
            $validatedData['cover_image'] = $path;
        }

        $disc->update($validatedData);

        return redirect()->route('discs.index')->with('success', 'Disco atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disc $disc)
    {
        // Exclui a imagem associada, se existir
        if ($disc->cover_image) {
            Storage::disk('public')->delete($disc->cover_image);
        }

        $disc->delete();

        return redirect()->route('discs.index')->with('success', 'Disco excluído com sucesso!');
    }
}
