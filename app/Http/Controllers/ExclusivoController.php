<?php

namespace App\Http\Controllers;

use App\Models\Exclusivo;

class ExclusivoController extends Controller
{
    public function index()
    {
        $exclusivos = Exclusivo::where('publicar', true)->latest()->get();
        return view('exclusivo.index', compact('exclusivos'));
    }

    public function show($id)
    {
        $exclusivo = Exclusivo::findOrFail($id);
        return view('exclusivo-show', compact('exclusivo'));
    }
}
