<?php

namespace App\Http\Controllers;

use App\Models\Boletin;

class BoletinController extends Controller
{
    public function index()
    {
        $boletines = Boletin::where('publicar', true)
            ->latest()
            ->paginate(9);

        return view('boletines.index', compact('boletines'));
    }
}
