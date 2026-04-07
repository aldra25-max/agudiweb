<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Socio;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Revista;
use App\Models\Sponsor;

class HomeController extends Controller
{
    public function index()
    {
        $sliders  = Slider::where('activo', true)->orderBy('orden')->get();
        $socios = Socio::where('activo', true)->get();
        $sponsors = Sponsor::where('activo', true)->get();
        $revistas = Revista::where('publicar', true)
                           ->orderBy('fecha_edicion', 'desc')
                           ->take(6)
                           ->get();
        $noticias = Noticia::where('publicar', true)->latest()->take(3)->get();
        $eventos  = Evento::where('publicar', true)
                          ->where('fecha_hora', '>=', now())
                          ->orderBy('fecha_hora')
                          ->take(3)
                          ->get();

        return view('home', compact('sliders', 'socios', 'sponsors', 'revistas', 'noticias', 'eventos'));
    }
}
