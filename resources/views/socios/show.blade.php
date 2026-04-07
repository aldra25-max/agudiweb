@extends('layouts.app')

@section('title', $socio->empresa)

@section('content')

    {{-- HERO --}}
    <section class="bg-[#1e3a8a] py-16">
        <div class="max-w-7xl mx-auto px-4">
            <a href="{{ route('socios.index') }}"
                class="inline-flex items-center gap-1 text-blue-300 hover:text-white
                  transition text-sm mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Volver a socios
            </a>
            <h1 class="text-4xl font-bold text-white">{{ $socio->empresa }}</h1>
        </div>
    </section>

    {{-- CONTENIDO --}}
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                {{-- Columna izquierda: Logo + datos --}}
                <div class="flex flex-col gap-6">

                    {{-- Logo --}}
                    <div class="bg-gray-100 rounded-2xl p-8 flex items-center justify-center min-h-48">
                        @if ($socio->logo)
                            <img src="{{ asset('storage/' . $socio->logo) }}" alt="{{ $socio->empresa }}"
                                class="max-h-32 max-w-full object-contain">
                        @else
                            <span class="text-4xl font-bold text-gray-300">
                                {{ strtoupper(substr($socio->empresa, 0, 2)) }}
                            </span>
                        @endif
                    </div>

                    {{-- Datos de contacto --}}
                    <div class="flex flex-col gap-3 text-sm text-gray-600">

                        @if ($socio->direccion)
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0
                                             01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $socio->direccion }}</span>
                            </div>
                        @endif

                        @if ($socio->telefono)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498
                                             4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042
                                             11.042 0 005.516 5.516l1.13-2.257a1 1 0
                                             011.21-.502l4.493 1.498a1 1 0 01.684.948V19a2
                                             2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $socio->telefono }}</span>
                            </div>
                        @endif
                        
                        @if ($socio->email)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
  d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $socio->email }}</span>
                            </div>
                        @endif

                        @if ($socio->link)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0
                                             105.656 5.656l1.102-1.101m-.758-4.899a4 4 0
                                             005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1
                                             1.1" />
                                </svg>
                                <a href="{{ $socio->link }}" target="_blank"
                                    class="text-blue-600 hover:underline truncate">
                                    {{ $socio->link }}
                                </a>
                            </div>
                        @endif

                        @if ($socio->fecha_ingreso)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0
                                             002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Socio desde {{ $socio->fecha_ingreso->format('Y') }}</span>
                            </div>
                        @endif

                    </div>

                    {{-- Redes sociales --}}
                    @if ($socio->linkedin || $socio->instagram || $socio->facebook)
                        <div class="flex items-center gap-3">
                            @if ($socio->linkedin)
                                <a href="{{ $socio->linkedin }}" target="_blank"
                                    class="w-9 h-9 rounded-full border border-gray-300 flex items-center
                              justify-center hover:border-blue-600 hover:text-blue-600
                              text-gray-500 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0
                                             00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z" />
                                        <circle cx="4" cy="4" r="2" />
                                    </svg>
                                </a>
                            @endif

                            @if ($socio->instagram)
                                <a href="{{ $socio->instagram }}" target="_blank"
                                    class="w-9 h-9 rounded-full border border-gray-300 flex items-center
                              justify-center hover:border-pink-500 hover:text-pink-500
                              text-gray-500 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"
                                            fill="none" stroke="currentColor" stroke-width="2" />
                                        <circle cx="12" cy="12" r="4" fill="none" stroke="currentColor"
                                            stroke-width="2" />
                                        <circle cx="17.5" cy="6.5" r="1.5" />
                                    </svg>
                                </a>
                            @endif

                            @if ($socio->facebook)
                                <a href="{{ $socio->facebook }}" target="_blank"
                                    class="w-9 h-9 rounded-full border border-gray-300 flex items-center
                              justify-center hover:border-blue-700 hover:text-blue-700
                              text-gray-500 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1
                                             1 0 011-1h3z" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    @endif

                </div>

                {{-- Columna derecha: Descripción --}}
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Sobre la empresa</h2>
                    @if ($socio->descripcion)
                        <p class="text-gray-600 leading-relaxed text-sm">
                            {{ $socio->descripcion }}
                        </p>
                    @else
                        <p class="text-gray-400 text-sm italic">Sin descripción disponible.</p>
                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection
