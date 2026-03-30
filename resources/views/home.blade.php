@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    {{-- ===================== SLIDER ===================== --}}
    @if ($sliders->count())
        <section class="relative w-full overflow-hidden" x-data="{ current: 0, total: {{ $sliders->count() }} }" x-init="setInterval(() => current = (current + 1) % total, 5000)">
            <div
                class="relative w-full aspect-[18/7] md:aspect-[23/9] max-h-[700px] bg-black flex items-center justify-center">
                @foreach ($sliders as $i => $slider)
                    <div class="absolute inset-0 transition-opacity duration-700"
                        :class="current === {{ $i }} ? 'opacity-100 z-10' : 'opacity-0 z-0'"> <img
                            src="{{ Storage::url($slider->imagen) }}" alt="{{ $slider->titulo }}"
                            class="w-full h-full object-cover transition duration-700 ease-in-out"> </div>
                @endforeach
            </div>
            {{-- Puntos de navegación --}} <div class="absolute bottom-5 left-0 right-0 flex justify-center gap-2 z-20">
                @foreach ($sliders as $i => $slider)
                    <button @click="current = {{ $i }}"
                        :class="current === {{ $i }} ? 'bg-white' : 'bg-white/40'"
                        class="w-2.5 h-2.5 rounded-full transition"></button>
                @endforeach
            </div>
        </section>
    @endif
    {{-- ===================== SOCIOS ===================== --}}
    @if ($socios->count())
        <section class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-center text-2xl font-bold mb-8">
                    Nuestros <em class="not-italic text-gray-400">Socios</em>
                </h2>

                <div class="flex flex-wrap justify-center items-center gap-8">
                    @foreach ($socios as $socio)
                        <a href="{{ $socio->link ?? '#' }}" target="_blank"
                            class="grayscale hover:grayscale-0 transition duration-300">
                            <div class="w-60 h-40 flex items-center justify-center">
                                <img src="{{ Storage::url($socio->logo) }}" alt="{{ $socio->empresa }}"
                                    class="max-h-full object-contain">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ===================== REVISTAS ===================== --}}
    @if (isset($revistas) && $revistas->count())
        <section class="bg-gradient-to-br from-[#17428C] to-[#17428C] py-20" x-data="{
            current: 0,
            total: {{ $revistas->count() }},
            autoplay: true,
            init() {
                setInterval(() => {
                    if (this.autoplay) {
                        this.next()
                    }
                }, 5000)
            },
            next() {
                this.current = (this.current + 1) % this.total
            },
            prev() {
                this.current = (this.current - 1 + this.total) % this.total
            }
        }">

            <div class="max-w-6xl mx-auto px-6">

                <div class="relative overflow-hidden">

                    <div class="flex transition-transform duration-700 ease-in-out"
                        :style="'transform: translateX(-' + (current * 100) + '%)'">

                        @foreach ($revistas as $revista)
                            <div class="min-w-full grid md:grid-cols-2 gap-12 items-center">

                                {{-- PORTADA --}}
                                <div class="flex justify-center">
                                    @if ($revista->imagen)
                                        <img src="{{ asset('storage/' . $revista->imagen) }}"
                                            class="h-[420px] object-contain drop-shadow-2xl transition duration-500 hover:scale-105">
                                    @endif
                                </div>
                                {{-- INFO --}}
                                <div class="text-white">
                                    <p class="text-blue-300 text-sm italic uppercase mb-4">
                                        Edición {{ $revista->edicion }}
                                    </p>
                                    @if ($revista->archivo_pdf)
                                        <a href="{{ asset('storage/' . $revista->archivo_pdf) }}" target="_blank"
                                            class="inline-block bg-[#e40c7e] px-8 py-3 rounded-full mb-6 hover:scale-105 transition">
                                            Leer revista
                                        </a>
                                    @endif
                                    {{-- INDICADORES (DOTS) --}}
                                    <div class="flex justify-center mt-10 gap-3">
                                        @foreach ($revistas as $i => $revista)
                                            <button @click="current = {{ $i }}"
                                                :class="current === {{ $i }} ? 'bg-white scale-125' : 'bg-white/40'"
                                                class="w-3 h-3 rounded-full transition-all duration-600">
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- ===================== NOTICIAS ===================== --}}
    @if ($noticias->count())
        <section class="py-16 max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold">
                    Noticias <em class="not-italic text-gray-400">destacadas</em>
                </h2>
                <a href="{{ route('noticias.index') }}"
                    class="text-sm font-medium text-gray-500 hover:text-black transition">
                    Ver todas →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($noticias as $noticia)
                    <article
                        class="group rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition">
                        @if ($noticia->imagen)
                            <a href="{{ route('noticias.show', $noticia->id) }}">
                                <img src="{{ Storage::url($noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            </a>
                        @endif
                        <div class="p-5">
                            <p class="text-xs text-gray-400 mb-2">{{ $noticia->created_at->format('d M Y') }}</p>
                            <h3 class="font-semibold text-gray-800 leading-snug mb-3 group-hover:text-black">
                                <a href="{{ route('noticias.show', $noticia->id) }}">
                                    {{ $noticia->titulo }}
                                </a>
                            </h3>
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
        </section>
    @endif
    {{-- ===================== EVENTOS ===================== --}}
    @if ($eventos->count())
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold">
                        Próximos <em class="not-italic text-gray-400">eventos</em>
                    </h2>
                    <a href="{{ route('eventos.index') }}"
                        class="text-sm font-medium text-gray-500 hover:text-black transition">
                        Ver todos →
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($eventos as $evento)
                        <article
                            class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition">
                            @if ($evento->imagen)
                                <img src="{{ Storage::url($evento->imagen) }}" alt="{{ $evento->titulo }}"
                                    class="w-full h-44 object-cover">
                            @endif
                            <div class="p-5">
                                <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ \Carbon\Carbon::parse($evento->fecha_hora)->format('d M Y, H:i') }}
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-1">{{ $evento->titulo }}</h3>
                                @if ($evento->lugar)
                                    <p class="text-sm text-gray-400 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $evento->lugar }}
                                    </p>
                                @endif
                                @if ($evento->link)
                                    <a href="{{ $evento->link }}" target="_blank"
                                        class="inline-block mt-4 text-sm font-medium text-black hover:underline">
                                        Más información →
                                    </a>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ===================== NEWSLETTER CTA ===================== --}}
    {{-- <section class="py-16 bg-black text-white">
        <div class="max-w-2xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-2">Suscríbete al newsletter</h2>
            <p class="text-gray-400 text-sm mb-6">Recibe las últimas noticias directamente en tu correo.</p>

            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <input type="email" id="newsletter-email" placeholder="Tu correo electrónico"
                    class="flex-1 px-4 py-3 rounded-full bg-white/10 text-white placeholder-gray-400 border border-white/20 focus:outline-none focus:border-white text-sm">
                <button onclick="suscribir()"
                    class="bg-white text-black font-semibold px-6 py-3 rounded-full hover:bg-gray-200 transition text-sm">
                    Suscribirme
                </button>
            </div>

            <p id="newsletter-msg" class="mt-4 text-sm hidden"></p>
        </div>
    </section>

    <script>
        function suscribir() {
            const email = document.getElementById('newsletter-email').value;
            const msg = document.getElementById('newsletter-msg');

            if (!email) {
                msg.textContent = 'Ingresa tu correo electrónico.';
                msg.className = 'mt-4 text-sm text-yellow-400';
                return;
            }

            fetch('{{ route('suscriptor.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        email
                    })
                })
                .then(r => r.json())
                .then(data => {
                    msg.textContent = data.message;
                    msg.className = 'mt-4 text-sm ' + (data.success ? 'text-green-400' : 'text-red-400');
                    msg.classList.remove('hidden');

                    if (data.success) {
                        document.getElementById('newsletter-email').value = '';
                    }
                });
        }
    </script> --}}

@endsection
