@extends('layouts.app')

@section('title', $noticia->titulo)

@section('content')

    {{-- IMAGEN PRINCIPAL --}}
    @if ($noticia->imagen)
        <div class="w-full h-[400px] overflow-hidden">
            <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                class="w-full h-full object-cover">
        </div>
    @endif

    {{-- CONTENIDO --}}
    <section class="max-w-4xl mx-auto px-4 py-12">

        {{-- Breadcrumb --}}
        <nav class="text-sm text-gray-400 mb-6">
            <a href="{{ url('/') }}" class="hover:text-black">Inicio</a>
            <span class="mx-2">/</span>
            <a href="{{ route('noticias.index') }}" class="hover:text-black">Noticias</a>
            <span class="mx-2">/</span>
            <span class="text-gray-600">{{ Str::limit($noticia->titulo, 40) }}</span>
        </nav>

        {{-- Meta --}}
        <p class="text-sm text-gray-400 mb-3">
            {{ $noticia->created_at->format('d M Y') }} &middot; Por <strong>{{ $noticia->autor }}</strong>
        </p>

        {{-- Título --}}
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-8">
            {{ $noticia->titulo }}
        </h1>

        {{-- Cuerpo --}}
        <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed">
            {!! $noticia->contenido !!}
        </div>

        {{-- Volver --}}
        <div class="mt-12 pt-8 border-t border-gray-100">
            <a href="{{ route('noticias.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-black transition">
                ← Volver a Noticias
            </a>
        </div>
    </section>

    {{-- NOTICIAS RELACIONADAS --}}
    @if ($relacionadas->count())
        <section class="bg-gray-50 py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-xl font-bold mb-8">Otras noticias</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($relacionadas as $rel)
                        <article
                            class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition">
                            @if ($rel->imagen)
                                <a href="{{ route('noticias.show', $rel->id) }}">
                                    <img src="{{ asset('storage/' . $rel->imagen) }}" alt="{{ $rel->titulo }}"
                                        class="w-full h-44 object-cover group-hover:scale-105 transition duration-300">
                                </a>
                            @endif
                            <div class="p-5">
                                <p class="text-xs text-gray-400 mb-2">{{ $rel->created_at->format('d M Y') }}</p>
                                <h3 class="font-semibold text-gray-800 leading-snug">
                                    <a href="{{ route('noticias.show', $rel->id) }}" class="hover:underline">
                                        {{ $rel->titulo }}
                                    </a>
                                </h3>
                                <a href="{{ route('noticias.show', $rel->id) }}"
                                    class="inline-block mt-3 text-sm font-medium text-black hover:underline">
                                    Leer más →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
