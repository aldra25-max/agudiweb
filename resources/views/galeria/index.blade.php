@extends('layouts.app')

@section('title', 'Galería')

@section('content')

    {{-- ENCABEZADO --}}
    <section class="py-16"style="background: linear-gradient(135deg, #0a1f4d 0%, #17428C 50%, #0e2d6b 100%);">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-white mb-2">Galería</h1>
            <p class="text-blue-300">Momentos y actividades de nuestra institución.</p>
        </div>
    </section>

    {{-- GALERÍA CON LIGHTBOX --}}
    <section class="py-14 bg-white">
        <div class="max-w-7xl mx-auto px-4" x-data="{
            lightbox: false,
            current: { src: '', descripcion: '' },
            imagenes: {{ $imagenes->map(
                    fn($i) => [
                        'src' => asset('storage/' . $i->imagen),
                        'descripcion' => $i->descripcion ?? '',
                    ],
                )->values()->toJson() }},
            currentIndex: 0,
            open(index) {
                this.currentIndex = index;
                this.current = this.imagenes[index];
                this.lightbox = true;
            },
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.imagenes.length) % this.imagenes.length;
                this.current = this.imagenes[this.currentIndex];
            },
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.imagenes.length;
                this.current = this.imagenes[this.currentIndex];
            },
            close() {
                this.lightbox = false;
            }
        }" @keydown.escape.window="close()"
            @keydown.arrow-left.window="lightbox && prev()" @keydown.arrow-right.window="lightbox && next()">

            @if ($imagenes->count())

                {{-- GRID --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($imagenes as $index => $imagen)
                        <div class="group relative overflow-hidden rounded-xl cursor-pointer"
                            style="aspect-ratio: 1 / 1; background: #f3f4f6;" @click="open({{ $loop->index }})">

                            <img src="{{ asset('storage/' . $imagen->imagen) }}"
                                alt="{{ $imagen->descripcion ?? 'Imagen galería' }}"
                                style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; transition: transform 0.3s;">

                            {{-- Overlay --}}
                            @if ($imagen->descripcion)
                                <div class="group-hover:opacity-100 opacity-0 transition duration-300 flex items-end"
                                    style="position: absolute; inset: 0; z-index: 1; background: rgba(0,0,0,0.4);">
                                    <p class="text-white text-sm px-4 py-3 line-clamp-2">
                                        {{ $imagen->descripcion }}
                                    </p>
                                </div>
                            @else
                                <div class="group-hover:opacity-100 opacity-0 transition duration-300"
                                    style="position: absolute; inset: 0; z-index: 1; background: rgba(0,0,0,0.2);">
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>

                {{-- PAGINACIÓN --}}
                @if ($imagenes->hasPages())
                    <div class="mt-12">
                        {{ $imagenes->links() }}
                    </div>
                @endif

                {{-- LIGHTBOX --}}
                <div x-show="lightbox" x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition duration-150"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 z-50 bg-black bg-opacity-90 flex items-center
                    justify-center p-4"
                    @click.self="close()" style="display: none;">

                    {{-- Botón cerrar --}}
                    <button @click="close()"
                        class="absolute top-4 right-4 text-white hover:text-gray-300
                           transition z-10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    {{-- Botón anterior --}}
                    <button @click="prev()" class="absolute left-4 text-white hover:text-gray-300 transition z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    {{-- Imagen --}}
                    <div class="flex flex-col items-center max-w-5xl w-full">
                        <img :src="current.src" :alt="current.descripcion"
                            class="max-h-[80vh] max-w-full object-contain rounded-lg shadow-2xl">

                        <p x-show="current.descripcion" x-text="current.descripcion"
                            class="text-white text-sm mt-4 text-center opacity-80 max-w-lg">
                        </p>

                        {{-- Contador --}}
                        <p class="text-gray-400 text-xs mt-2">
                            <span x-text="currentIndex + 1"></span> / <span x-text="imagenes.length"></span>
                        </p>
                    </div>

                    {{-- Botón siguiente --}}
                    <button @click="next()" class="absolute right-4 text-white hover:text-gray-300 transition z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                </div>
            @else
                <p class="text-gray-400 text-center py-20">No hay imágenes en la galería.</p>
            @endif

        </div>
    </section>

@endsection
