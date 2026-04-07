<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoletinController;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ExclusivoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\SuscriptorController;
use App\Http\Controllers\AsociacionController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Nosotros (Misión/Visión + Sponsors + Directorio)
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros.index');

// Noticias
Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');

// Eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');

// Socios
Route::get('/socios', [SocioController::class, 'index'])->name('socios.index');
Route::get('/socios/{id}', [SocioController::class, 'show'])->name('socios.show');

// Galería
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria.index');

// Revista
Route::get('/revistas', [RevistaController::class, 'index'])->name('revistas.index');

// Boletines
Route::get('/boletines', [BoletinController::class, 'index'])->name('boletines.index');

// Publicaciones
Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('publicaciones.index');
Route::get('/publicaciones/{id}', [PublicacionController::class, 'show'])->name('publicaciones.show');

// Exclusivo
Route::get('/exclusivo', [ExclusivoController::class, 'index'])->name('exclusivo.index');
Route::get('/exclusivo/{id}', [ExclusivoController::class, 'show'])->name('exclusivo.show');

// Newsletter (POST)
Route::post('/suscribirse', [SuscriptorController::class, 'store'])->name('suscriptor.store');

Route::get('/asociacion', [AsociacionController::class, 'index'])->name('asociacion');
Route::post('/asociacion', [AsociacionController::class, 'store'])->name('asociacion.store');

Route::get('/validar-ruc', function (Request $request) {
    return response()->json([
        'exists' => \App\Models\Asociacion::where('ruc', $request->ruc)->exists()
    ]);
});

Route::get('/login-empresas', [AuthController::class, 'showLogin'])->name('login.empresa');
Route::post('/login-empresas', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.empresa');

// Zona exclusiva — protegida con guard empresa
Route::middleware('auth:empresa')->group(function () {
    Route::get('/exclusivo', [ExclusivoController::class, 'index'])->name('exclusivo.index');
});
