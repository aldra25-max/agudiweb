<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Directorio;

class NosotrosController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::where('activo', true)
                           ->orderBy('empresa')
                           ->get();

        $directorio = Directorio::where('activo', true)
                                ->orderBy('empresa')
                                ->orderBy('nombre')
                                ->get();

        return view('nosotros.index', compact('sponsors', 'directorio'));
    }
}
