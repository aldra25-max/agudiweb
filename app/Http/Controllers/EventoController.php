<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class EventoController extends Controller
{
    public function index()
    {
        $proximos = Evento::where('publicar', true)
            ->where('fecha_hora', '>=', now())
            ->orderBy('fecha_hora', 'asc')
            ->get();

        $pasados = Evento::where('publicar', true)
            ->where('fecha_hora', '<', now())
            ->orderBy('fecha_hora', 'desc')
            ->paginate(6);

        return view('eventos.index', compact('proximos', 'pasados'));
    }
}
