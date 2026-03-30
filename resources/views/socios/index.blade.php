@extends('layouts.app')

@section('title', 'Socios')

@section('content')

    {{-- ENCABEZADO --}}
    <section class="bg-[#1e3a8a] py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-white mb-2">Socios</h1>
            <p class="text-blue-300">Empresas asociadas a nuestra institución.</p>
        </div>
    </section>

    {{-- GRID --}}
    <section class="max-w-7xl mx-auto px-4 py-14">
        @if ($socios->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($socios as $socio)
                    <a href="{{ route('socios.show', $socio->id) }}"
                        class="group flex flex-col bg-gray-100 rounded-xl overflow-hidden
                  hover:shadow-lg transition duration-300">

                        {{-- Logo --}}
                        <div
                            class="w-full aspect-[4/3] bg-gray-100 flex items-center
                        justify-center p-6 overflow-hidden">
                            @if ($socio->logo)
                                <img src="{{ asset('storage/' . $socio->logo) }}" alt="{{ $socio->empresa }}"
                                    class="max-h-24 max-w-full object-contain
                                group-hover:scale-105 transition duration-300">
                            @else
                                <span class="text-2xl font-bold text-gray-300 text-center">
                                    {{ strtoupper(substr($socio->empresa, 0, 2)) }}
                                </span>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="bg-white px-4 py-4 flex flex-col gap-2">

                            <p class="text-sm font-bold text-gray-800 leading-tight">
                                {{ strtoupper($socio->empresa) }}
                            </p>

                            {{-- Redes sociales --}}
                            <div class="flex items-center gap-2 flex-wrap">
                                @if ($socio->linkedin)
                                    <a href="{{ $socio->linkedin }}" target="_blank" onclick="event.stopPropagation()"
                                        class="w-7 h-7 rounded-full border border-gray-300 flex items-center
                              justify-center hover:border-blue-600 hover:text-blue-600
                              text-gray-500 transition">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0
                                                 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z" />
                                            <circle cx="4" cy="4" r="2" />
                                        </svg>
                                    </a>
                                @endif

                                @if ($socio->instagram)
                                    <a href="{{ $socio->instagram }}" target="_blank" onclick="event.stopPropagation()"
                                        class="w-7 h-7 rounded-full border border-gray-300 flex items-center
                              justify-center hover:border-pink-500 hover:text-pink-500
                              text-gray-500 transition">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"
                                                fill="none" stroke="currentColor" stroke-width="2" />
                                            <circle cx="12" cy="12" r="4" fill="none" stroke="currentColor"
                                                stroke-width="2" />
                                            <circle cx="17.5" cy="6.5" r="1.5" />
                                        </svg>
                                    </a>
                                @endif

                                @if ($socio->facebook)
                                    <a href="{{ $socio->facebook }}" target="_blank" onclick="event.stopPropagation()"
                                        class="w-7 h-7 rounded-full border border-gray-300 flex items-center
                              justify-center hover:border-blue-700 hover:text-blue-700
                              text-gray-500 transition">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1
                                                 1 0 011-1h3z" />
                                        </svg>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>

            {{-- PAGINACIÓN --}}
            <div class="mt-12">
                {{ $socios->links() }}
            </div>
        @else
            <p class="text-gray-400 text-center py-20">No hay socios registrados aún.</p>
        @endif
    </section>

@endsection
