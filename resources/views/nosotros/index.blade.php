@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')

    {{-- HERO BANNER --}}
    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold text-gray-800">Nosotros</h1>
            <p class="text-gray-500 text-sm mt-2">Conoce quiénes somos, nuestra misión y nuestro equipo.</p>
        </div>
    </section>

    {{-- MISIÓN Y VISIÓN --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-gray-50 rounded-2xl p-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Misión</h2>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        {{-- ✏️ Reemplaza con tu texto --}}
                        Somos una organización comprometida con el desarrollo y fortalecimiento
                        del sector, promoviendo la integración, la competitividad y el bienestar
                        de nuestros asociados a través de servicios de calidad.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-2xl p-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Visión</h2>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        {{-- ✏️ Reemplaza con tu texto --}}
                        Ser la institución gremial líder y referente, reconocida por su capacidad
                        de representación, innovación y aporte al desarrollo sostenible del sector
                        a nivel nacional e internacional.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- SPONSORS --}}
    @if ($sponsors->count())
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4">

                <div class="text-center mb-10">
                    <h2 class="text-3xl text-gray-800">
                        Nuestros <em class="italic font-serif">Sponsors</em>
                    </h2>
                    <p class="text-gray-400 text-sm mt-2">
                        Las empresas asociadas representan servicios en diversos rubros.
                    </p>
                </div>

                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 divide-x divide-y divide-gray-200 border border-gray-200">
                    @foreach ($sponsors as $sponsor)
                        <a href="{{ $sponsor->web ?: '#' }}" target="{{ $sponsor->web ? '_blank' : '_self' }}"
                            class="bg-gray-100 hover:bg-white transition-colors duration-200
                      flex items-center justify-center p-8 min-h-36 group">
                            @if ($sponsor->logo)
                                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->empresa }}"
                                    class="max-h-12 max-w-32 w-auto object-contain
                                opacity-70 group-hover:opacity-100 transition-opacity duration-200">
                            @else
                                <span class="text-sm text-gray-500 font-medium text-center">
                                    {{ $sponsor->empresa }}
                                </span>
                            @endif
                        </a>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    {{-- DIRECTORIO --}}
    @if ($directorio->count())
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4">

                <h2 class="text-2xl text-center text-gray-800 font-light tracking-wide mb-12">
                    Directorio
                </h2>

                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-6">
                    @foreach ($directorio as $miembro)
                        <div class="flex flex-col items-start">

                            @if ($miembro->foto)
                                <img src="{{ asset('storage/' . $miembro->foto) }}" alt="{{ $miembro->nombre }}"
                                    class="w-full aspect-[3/4] object-cover object-top rounded-sm bg-gray-100 mb-3">
                            @else
                                <div
                                    class="w-full aspect-[3/4] bg-gray-100 flex items-center justify-center rounded-sm mb-3">
                                    <span class="text-4xl text-gray-300 font-light">
                                        {{ strtoupper(substr($miembro->nombre, 0, 1)) }}
                                    </span>
                                </div>
                            @endif

                            <p class="text-[11px] text-gray-400 leading-tight mb-0.5">
                                {{ $miembro->cargo }}
                            </p>
                            <p class="text-xs font-semibold text-gray-800 leading-snug">
                                {{ $miembro->nombre }}
                                @if ($miembro->empresa)
                                    <span class="font-normal text-gray-500">/ {{ $miembro->empresa }}</span>
                                @endif
                            </p>

                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

@endsection
