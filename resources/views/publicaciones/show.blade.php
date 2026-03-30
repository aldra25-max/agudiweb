@extends('layouts.app')

@section('title', $publicacion->titulo)

@section('content')

    {{-- HERO con imagen --}}
    @if ($publicacion->imagen)
        <div class="w-full h-72 md:h-96 bg-gray-100 overflow-hidden">
            <img src="{{ asset('storage/' . $publicacion->imagen) }}" alt="{{ $publicacion->titulo }}"
                class="w-full h-full object-cover">
        </div>
    @endif

    {{-- CONTENIDO --}}
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4">

            {{-- Volver --}}
            <a href="{{ route('publicaciones.index') }}"
                class="inline-flex items-center gap-1 text-sm text-gray-400
                  hover:text-gray-700 transition mb-8">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Volver a publicaciones
            </a>

            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight mb-8">
                {{ $publicacion->titulo }}
            </h1>

            <div class="prose prose-gray max-w-none text-gray-600 leading-relaxed">
                {!! nl2br(e($publicacion->contenido)) !!}
            </div>

        </div>
    </section>

    {{-- RELACIONADAS --}}
    @if ($relacionadas->count())
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4">

                <h3 class="text-xl font-semibold text-gray-800 mb-8">Otras publicaciones</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($relacionadas as $rel)
                        <a href="{{ route('publicaciones.show', $rel->id) }}"
                            class="group flex gap-4 bg-white border border-gray-100
                      rounded-xl p-4 hover:shadow-md transition-shadow duration-200">

                            <div class="w-20 h-20 rounded-lg bg-gray-100 overflow-hidden flex-shrink-0">
                                @if ($rel->imagen)
                                    <img src="{{ asset('storage/' . $rel->imagen) }}" alt="{{ $rel->titulo }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0
                                                 012-2h5.586a1 1 0 01.707.293l5.414
                                                 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="flex flex-col justify-center">
                                <p
                                    class="text-sm font-semibold text-gray-800 leading-snug
                               line-clamp-2 group-hover:text-black">
                                    {{ $rel->titulo }}
                                </p>
                                <span class="text-xs text-gray-400 mt-1">Leer más →</span>
                            </div>

                        </a>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

@endsection
