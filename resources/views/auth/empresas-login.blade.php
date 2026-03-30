@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <section class="relative w-full h-screen">

        <img src="{{ asset('images/login-bg.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-xl w-full max-w-md text-white">
                <h2 class="text-2xl font-bold text-center mb-6">Ingreso Socios</h2>
                <form method="POST" action="/login-empresas" class="space-y-4">
                    @csrf
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-300">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="email" name="email" placeholder="Correo"
                            class="w-full pl-10 pr-3 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-300">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" name="password" placeholder="Contraseña"
                            class="w-full pl-10 pr-3 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    @error('email')
                        <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 transition py-2 rounded-lg font-semibold">
                        Ingresar
                    </button>

                </form>
            </div>
        </div>
    </section>
@endsection
