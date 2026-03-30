<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suscriptor;

class SuscriptorController extends Controller
{
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|email|unique:suscriptors,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Este correo ya está suscrito.',
            ]);
        }

        Suscriptor::create([
            'email'             => $request->email,
            'activo'            => true,
            'fecha_suscripcion' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => '¡Te has suscrito correctamente!',
        ]);
    }
}
