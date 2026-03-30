<?php

namespace App\Http\Controllers;

use App\Models\Socio;

class SocioController extends Controller
{
    public function index()
    {
        $socios = Socio::where('activo', true)
            ->orderBy('empresa')
            ->paginate(12);

        return view('socios.index', compact('socios'));
    }

    public function show($id)
    {
        $socio = Socio::where('activo', true)->findOrFail($id);

        return view('socios.show', compact('socio'));
    }
}
