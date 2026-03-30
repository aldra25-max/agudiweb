@extends('layouts.app')

@section('title', 'Boletines')

@section('content')

    {{-- ENCABEZADO --}}
    <section class="bg-[#1e3a8a] py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-white mb-2">Boletines</h1>
            <p class="text-blue-300">Accede a todas nuestras ediciones publicadas.</p>
        </div>
    </section>

    {{-- GRID DE BOLETINES --}}
    <section class="max-w-7xl mx-auto px-4 py-14">
        @if ($boletines->count())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($boletines as $boletin)
                    <article class="group flex flex-col items-center text-center">

                        {{-- Portada --}}
                        <div
                            class="w-full overflow-hidden rounded-lg shadow-md group-hover:shadow-xl transition duration-300 mb-4">
                            @if ($boletin->imagen)
                                <img src="{{ asset('storage/' . $boletin->imagen) }}" alt="{{ $boletin->titulo }}"
                                    class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full aspect-[3/4] bg-[#1e3a8a] flex items-center justify-center">
                                    <span class="text-white text-lg font-bold px-4">{{ $boletin->titulo }}</span>
                                </div>
                            @endif
                        </div>

                        {{-- Título --}}
                        <p class="text-sm font-semibold text-blue-600 mb-3 line-clamp-2">
                            {{ $boletin->titulo }}
                        </p>

                        {{-- Botón leer --}}
                        @if ($boletin->link)
                            <a href="{{ $boletin->link }}" target="_blank" rel="noopener noreferrer"
                                class="inline-block bg-red-500 hover:bg-red-600 text-white text-sm
                      font-semibold px-5 py-2 rounded-full transition">
                                Leer edición
                            </a>
                        @endif

                    </article>
                @endforeach
            </div>

            {{-- PAGINACIÓN --}}
            <div class="mt-12">
                {{ $boletines->links() }}
            </div>
        @else
            <p class="text-gray-400 text-center py-20">No hay boletines publicados aún.</p>
        @endif
    </section>

@endsection
