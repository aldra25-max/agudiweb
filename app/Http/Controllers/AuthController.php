<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Empresa;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.empresas-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('empresa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/exclusivo');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        Auth::guard('empresa')->logout();
        return redirect('/login-empresas');
    }
}
