@extends('layouts.app')

@section('title', 'Noticias')

@section('content')

{{-- ENCABEZADO --}}
<section class="py-16"style="background: linear-gradient(135deg, #0a1f4d 0%, #17428C 50%, #0e2d6b 100%);">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold mb-2">Noticias</h1>
        <p class="text-gray-500">Últimas novedades y artículos de la industria.</p>
    </div>
</section>

{{-- LISTADO --}}
<section class="max-w-7xl mx-auto px-4 py-14">
    @if($noticias->count())
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($noticias as $noticia)
        <article class="group rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition">
            @if($noticia->imagen)
            <a href="{{ route('noticias.show', $noticia->id) }}">
                <img src="{{ asset('storage/' . $noticia->imagen) }}"
                     alt="{{ $noticia->titulo }}"
                     class="w-full h-52 object-cover group-hover:scale-105 transition duration-300">
            </a>
            @endif
            <div class="p-5">
                <p class="text-xs text-gray-400 mb-2">
                    {{ $noticia->created_at->format('d M Y') }} &middot; {{ $noticia->autor }}
                </p>
                <h2 class="font-semibold text-gray-800 leading-snug mb-3">
                    <a href="{{ route('noticias.show', $noticia->id) }}" class="hover:underline">
                        {{ $noticia->titulo }}
                    </a>
                </h2>
                <p class="text-sm text-gray-500 line-clamp-3">
                    {{ strip_tags($noticia->contenido) }}
                </p>
                <a href="{{ route('noticias.show', $noticia->id) }}"
                   class="inline-block mt-4 text-sm font-medium text-black hover:underline">
                    Leer más →
                </a>
            </div>
        </article>
        @endforeach
    </div>

    {{-- PAGINACIÓN --}}
    <div class="mt-12">
        {{ $noticias->links() }}
    </div>

    @else
    <p class="text-gray-400 text-center py-20">No hay noticias publicadas aún.</p>
    @endif
</section>

@endsection
