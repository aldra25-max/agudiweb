@extends('layouts.app')

@section('title', 'Revistas')

@section('content')

    {{-- ENCABEZADO --}}
    <section class="bg-[#1e3a8a] py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-white mb-2">Revistas</h1>
            <p class="text-blue-300">Todas las ediciones publicadas.</p>
        </div>
    </section>

    {{-- GRID DE REVISTAS --}}
    <section class="max-w-7xl mx-auto px-4 py-14">
        @if ($revistas->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($revistas as $revista)
                    <article
                        class="group flex flex-col rounded-2xl overflow-hidden shadow-md
                        hover:shadow-xl transition duration-300 bg-white">

                        {{-- Portada grande --}}
                        <div class="relative w-full aspect-[3/4] overflow-hidden">
                            @if ($revista->imagen)
                                <img src="{{ asset('storage/' . $revista->imagen) }}" alt="Edición {{ $revista->edicion }}"
                                    class="w-full h-full object-cover group-hover:scale-105
                                transition duration-500">
                            @else
                                <div class="w-full h-full bg-[#1e3a8a] flex items-center justify-center">
                                    <span class="text-white text-3xl font-bold">N° {{ $revista->edicion }}</span>
                                </div>
                            @endif
                        </div>

                        {{-- Franja blanca inferior --}}
                        <div class="flex flex-col items-center text-center px-6 py-5 bg-white gap-3">

                            <p class="text-base font-semibold text-blue-600">
                                Edición {{ $revista->edicion }}
                            </p>

                            @if ($revista->archivo_pdf)
                                <a href="{{ asset('storage/' . $revista->archivo_pdf) }}" target="_blank"
                                    rel="noopener noreferrer"
                                    class="border border-gray-300 text-gray-700 text-sm font-medium
                          px-6 py-2 rounded-full hover:border-gray-500
                          hover:text-gray-900 transition-colors duration-200">
                                    Leer edición
                                </a>
                            @endif

                        </div>

                    </article>
                @endforeach
            </div>

            {{-- PAGINACIÓN --}}
            <div class="mt-12">
                {{ $revistas->links() }}
            </div>
        @else
            <p class="text-gray-400 text-center py-20">No hay revistas publicadas aún.</p>
        @endif
    </section>

@endsection
