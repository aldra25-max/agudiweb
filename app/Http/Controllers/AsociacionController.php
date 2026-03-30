<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asociacion;

class AsociacionController extends Controller
{
    public function index()
    {
        return view('asociacion.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'razon_social' => 'required|string|max:255',
            'ruc' => 'required|digits:11|unique:asociacions,ruc',
            'direccion' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|digits:9',

            'representante_legal' => 'required',
            'celular_representante' => 'required|digits:9',
            'email_representante' => 'required|email',

            'contactos' => 'required|array|min:1',
            'contactos.*.nombre' => 'required',
            'contactos.*.telefono' => 'required|digits:9',
            'contactos.*.correo' => 'required|email',

            'maquinarias' => 'required|array|size:2',
            'servicios' => 'required|array|size:5',
        ], [
    'ruc.unique' => 'El RUC ya está registrado',
    'ruc.digits' => 'El RUC debe tener 11 dígitos',
]);

        \App\Models\Asociacion::create($data);

        return back()->with('success', 'Solicitud enviada correctamente');
    }
}
