<?php

namespace App\Http\Controllers;

use App\Models\Revista;

class RevistaController extends Controller
{
    public function index()
    {
        $revistas = Revista::where('publicar', true)
                           ->orderBy('fecha_edicion', 'desc')
                           ->paginate(12);

        return view('revistas.index', compact('revistas'));
    }
}
