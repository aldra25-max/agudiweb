@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

    {{-- HERO --}}
    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold text-gray-800">Publicaciones</h1>
            <p class="text-gray-500 text-sm mt-2">Documentos, informes y contenido de interés para nuestros asociados.</p>
        </div>
    </section>

    {{-- GRID --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            @if ($publicaciones->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($publicaciones as $pub)
                        <a href="{{ route('publicaciones.show', $pub->id) }}"
                            class="group flex flex-col bg-white border border-gray-100 rounded-2xl
                      overflow-hidden hover:shadow-md transition-shadow duration-200">

                            {{-- Imagen --}}
                            <div class="aspect-video bg-gray-100 overflow-hidden">
                                @if ($pub->imagen)
                                    <img src="{{ asset('storage/' . $pub->imagen) }}" alt="{{ $pub->titulo }}"
                                        class="w-full h-full object-cover group-hover:scale-105
                                    transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0
                                                 012-2h5.586a1 1 0 01.707.293l5.414
                                                 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Texto --}}
                            <div class="p-6 flex flex-col flex-1">
                                <h2
                                    class="text-base font-semibold text-gray-800 mb-2 group-hover:text-black
                               leading-snug line-clamp-2">
                                    {{ $pub->titulo }}
                                </h2>
                                <p class="text-sm text-gray-500 leading-relaxed line-clamp-3 flex-1">
                                    {{ strip_tags($pub->contenido) }}
                                </p>
                                <span class="mt-4 text-xs font-semibold text-gray-800 flex items-center gap-1">
                                    Leer más
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </div>

                        </a>
                    @endforeach
                </div>

                {{-- Paginación --}}
                @if ($publicaciones->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $publicaciones->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-20 text-gray-400">
                    <p class="text-lg">No hay publicaciones disponibles.</p>
                </div>
            @endif

        </div>
    </section>

@endsection
