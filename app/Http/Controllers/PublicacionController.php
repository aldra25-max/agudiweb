<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::where('publicar', true)
            ->latest()
            ->paginate(9);

        return view('publicaciones.index', compact('publicaciones'));
    }

    public function show($id)
    {
        $publicacion = Publicacion::where('publicar', true)
            ->findOrFail($id);

        $relacionadas = Publicacion::where('publicar', true)
            ->where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();

        return view('publicaciones.show', compact('publicacion', 'relacionadas'));
    }
}
