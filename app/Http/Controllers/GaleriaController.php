<?php

namespace App\Http\Controllers;

use App\Models\Galeria;

class GaleriaController extends Controller
{
    public function index()
    {
        $imagenes = Galeria::where('activo', true)
            ->orderBy('orden')
            ->paginate(12);

        return view('galeria.index', compact('imagenes'));
    }
}
