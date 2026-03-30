<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('publicar', true)
                           ->latest()
                           ->paginate(9);

        return view('noticias.index', compact('noticias'));
    }

    public function show($id)
    {
        $noticia = Noticia::where('publicar', true)->findOrFail($id);

        $relacionadas = Noticia::where('publicar', true)
                               ->where('id', '!=', $id)
                               ->latest()
                               ->take(3)
                               ->get();

        return view('noticias.show', compact('noticia', 'relacionadas'));
    }
}
