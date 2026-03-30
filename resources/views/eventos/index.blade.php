@extends('layouts.app')

@section('title', 'Eventos')

@section('content')

    {{-- ENCABEZADO --}}
    <section class="bg-[#1e3a8a] py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-white mb-2">Eventos</h1>
            <p class="text-blue-300">Actividades y encuentros de nuestra institución.</p>
        </div>
    </section>

    {{-- PRÓXIMOS EVENTOS --}}
    @if ($proximos->count())
        <section class="py-14 bg-white">
            <div class="max-w-7xl mx-auto px-4">

                <h2 class="text-2xl font-semibold text-gray-800 mb-8">
                    Próximos eventos
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($proximos as $evento)
                        <div
                            class="group flex flex-col bg-white border border-gray-100
                        rounded-2xl overflow-hidden hover:shadow-lg transition duration-300">

                            {{-- Imagen --}}
                            <div class="relative w-full aspect-video bg-gray-100 overflow-hidden">
                                @if ($evento->imagen)
                                    <img src="{{ asset('storage/' . $evento->imagen) }}" alt="{{ $evento->titulo }}"
                                        class="w-full h-full object-cover group-hover:scale-105
                                    transition duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-blue-50">
                                        <svg class="w-10 h-10 text-blue-200" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0
                                                 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                {{-- Badge fecha --}}
                                <div
                                    class="absolute top-3 left-3 bg-white rounded-xl shadow px-3 py-2
                                text-center min-w-14">
                                    <p class="text-xs font-semibold text-blue-600 uppercase leading-none">
                                        {{ $evento->fecha_hora->format('M') }}
                                    </p>
                                    <p class="text-2xl font-bold text-gray-800 leading-tight">
                                        {{ $evento->fecha_hora->format('d') }}
                                    </p>
                                </div>
                            </div>

                            {{-- Info --}}
                            <div class="p-5 flex flex-col gap-3 flex-1">

                                <h3 class="text-base font-semibold text-gray-800 leading-snug line-clamp-2">
                                    {{ $evento->titulo }}
                                </h3>

                                <div class="flex flex-col gap-1.5 text-sm text-gray-500">

                                    {{-- Hora --}}
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $evento->fecha_hora->format('H:i') }} hrs —
                                            {{ $evento->fecha_hora->format('d/m/Y') }}</span>
                                    </div>

                                    {{-- Lugar --}}
                                    @if ($evento->lugar)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0
                                                 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="line-clamp-1">{{ $evento->lugar }}</span>
                                        </div>
                                    @endif

                                </div>

                                {{-- Botón link externo --}}
                                @if ($evento->link)
                                    <a href="{{ $evento->link }}" target="_blank" rel="noopener noreferrer"
                                        class="mt-auto inline-flex items-center justify-center gap-1
                              bg-[#1e3a8a] hover:bg-blue-900 text-white text-sm
                              font-medium px-5 py-2.5 rounded-full transition duration-200">
                                        Ver evento
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0
                                             002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- EVENTOS PASADOS --}}
    @if ($pasados->count())
        <section class="py-14 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4">

                <h2 class="text-2xl font-semibold text-gray-800 mb-8">
                    Eventos pasados
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($pasados as $evento)
                        <div
                            class="flex flex-col bg-white border border-gray-100
                        rounded-2xl overflow-hidden opacity-80 hover:opacity-100
                        hover:shadow-md transition duration-300">

                            {{-- Imagen --}}
                            <div class="relative w-full aspect-video bg-gray-100 overflow-hidden">
                                @if ($evento->imagen)
                                    <img src="{{ asset('storage/' . $evento->imagen) }}" alt="{{ $evento->titulo }}"
                                        class="w-full h-full object-cover grayscale">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0
                                                 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                {{-- Badge "Finalizado" --}}
                                <div
                                    class="absolute top-3 left-3 bg-gray-700 text-white
                                text-xs font-medium px-3 py-1 rounded-full">
                                    Finalizado
                                </div>
                            </div>

                            {{-- Info --}}
                            <div class="p-5 flex flex-col gap-2">
                                <h3 class="text-base font-semibold text-gray-700 leading-snug line-clamp-2">
                                    {{ $evento->titulo }}
                                </h3>

                                <div class="flex flex-col gap-1.5 text-sm text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0
                                                 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>{{ $evento->fecha_hora->format('d/m/Y') }}</span>
                                    </div>

                                    @if ($evento->lugar)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0
                                                 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="line-clamp-1">{{ $evento->lugar }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                {{-- PAGINACIÓN --}}
                <div class="mt-12">
                    {{ $pasados->links() }}
                </div>

            </div>
        </section>
    @endif

    {{-- Sin eventos --}}
    @if (!$proximos->count() && !$pasados->count())
        <div class="text-center py-20 text-gray-400">
            <p class="text-lg">No hay eventos disponibles.</p>
        </div>
    @endif

@endsection
