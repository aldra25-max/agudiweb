@extends('layouts.app')

@section('title')

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
    {{-- ===================== SPONSORS ===================== --}}
    @if ($sponsors->count())
        <section class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 mb-4">
                <h2 class="text-center text-2xl font-bold">
                    Nuestros <em class="not-italic text-gray-400">Sponsors</em>
                </h2>
                </div>
                <div class="flex flex-wrap justify-center items-center gap-8 gap-y-3">
                    @foreach ($sponsors as $sponsor)
                        <a href="{{ $sponsor->web ?? '#' }}" target="_blank">
                            <div class="w-44 h-36 md:w-60 md:h-40 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->empresa }}"
                                    class="max-h-full object-contain">
                            </div>
                        </a>
                    @endforeach
                </div>
        </section>
    @endif
    {{-- ===================== REVISTAS ===================== --}}
    @if (isset($revistas) && $revistas->count())
        <section class="relative py-12 overflow-hidden" x-data="{
            current: 0,
            total: {{ $revistas->count() }},
            autoplay: true,
            init() {
                setInterval(() => { if (this.autoplay) this.next() }, 9000)
            },
            next() { this.current = (this.current + 1) % this.total },
            prev() { this.current = (this.current - 1 + this.total) % this.total }
        }"
            style="background: linear-gradient(135deg, #0a1f4d 0%, #17428C 50%, #0e2d6b 100%);">
{{-- =====================
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-0 right-0 w-96 h-96 rounded-full opacity-5"
                    style="background: radial-gradient(circle, #ffffff 0%, transparent 70%); transform: translate(30%, -30%);">
                </div>
                <div class="absolute bottom-0 left-0 w-80 h-80 rounded-full opacity-5"
                    style="background: radial-gradient(circle, #e40c7e 0%, transparent 70%); transform: translate(-30%, 30%);">
                </div>
                <div class="absolute inset-0 opacity-[0.03]"
                    style="background-image: linear-gradient(rgba(255,255,255,0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.5) 1px, transparent 1px); background-size: 60px 60px;">
                </div>
            </div> ===================== --}}

            <div class="max-w-4xl mx-auto px-6 relative z-10">
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                        Nuestra Revista
                    </h2>
                    <div class="mt-5 mx-auto w-12 h-px bg-[#e40c7e]"></div>
                </div>
                <div class="relative">
                    {{-- Prev. button --}}
                    <button @click="prev(); autoplay = false"
                        class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-5 z-20
                       w-11 h-11 rounded-full flex items-center justify-center
                       border border-white/20 bg-white/5 backdrop-blur-sm
                       text-white hover:bg-white/15 hover:border-white/40
                       transition-all duration-300 hidden md:flex"
                        aria-label="Anterior">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    {{-- Slides --}}
                    <div class="overflow-hidden rounded-2xl">
                        <div class="flex transition-transform duration-700 ease-in-out"
                            :style="'transform: translateX(-' + (current * 100) + '%)'">
                            @foreach ($revistas as $revista)
                                <div class="min-w-full grid md:grid-cols-2 items-center px-2 py-4">
                                    {{-- Portada --}}
                                    <div class="flex justify-center items-center">
                                        <div class="relative group">
                                            <div
                                                class="absolute inset-0 bg-[#e40c7e]/20 blur-3xl rounded-full scale-75 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                            </div>
                                            @if ($revista->imagen)
                                                <img src="{{ asset('storage/' . $revista->imagen) }}"
                                                    alt="Portada edición {{ $revista->edicion }}"
                                                    class="relative h-[420px] object-contain rounded-xl
                                                shadow-[0_30px_80px_rgba(0,0,0,0.5)]
                                                transition-transform duration-700 ease-out
                                                group-hover:-translate-y-3 group-hover:scale-[1.02]">
                                            @endif
                                        </div>
                                    </div>
                                    {{-- Contenido --}}
                                    <div class="text-white flex flex-col justify-center items-center pt-8">
                                        <div class="inline-flex items-center gap-2 mb-4 w-fit">
                                            <div class="w-1.5 h-1.5 rounded-full bg-[#e40c7e]"></div>
                                            <h3 class="text-3xl md:text-4xl font-bold text-white leading-snug mb-4">
                                                Edición {{ $revista->edicion }}
                                            </h3>
                                        </div>
                                        @if ($revista->archivo_pdf)
                                            <div class="flex flex-wrap gap-4 items-center">
                                                <a href="{{ asset('storage/' . $revista->archivo_pdf) }}" target="_blank"
                                                    class="group/btn inline-flex items-center gap-3 px-8 py-3.5
                                          bg-[#e40c7e] hover:bg-[#c50a6e] text-white font-semibold
                                          rounded-full transition-all duration-300
                                          hover:shadow-[0_8px_30px_rgba(228,12,126,0.45)]
                                          hover:-translate-y-0.5 active:translate-y-0">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        stroke-width="2.5" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                    </svg>
                                                    Leer revista
                                                    <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover/btn:translate-x-1"
                                                        fill="none" stroke="currentColor" stroke-width="2.5"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                                    </svg>
                                                </a>
                                            </div>
                                        @endif
                                        {{-- Dots --}}
                                        <div class="flex items-center gap-2.5 mt-12">
                                            @foreach ($revistas as $i => $_)
                                                <button @click="current = {{ $i }}; autoplay = false"
                                                    :class="current === {{ $i }} ?
                                                        'w-8 bg-[#e40c7e]' :
                                                        'w-2.5 bg-white/25 hover:bg-white/50'"
                                                    class="h-2.5 rounded-full transition-all duration-500"
                                                    aria-label="Ir a edición {{ $i + 1 }}">
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Next button --}}
                    <button @click="next(); autoplay = false"
                        class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-5 z-20
                       w-11 h-11 rounded-full flex items-center justify-center
                       border border-white/20 bg-white/5 backdrop-blur-sm
                       text-white hover:bg-white/15 hover:border-white/40
                       transition-all duration-300 hidden md:flex"
                        aria-label="Siguiente">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    @endif
    {{-- ===================== SOCIOS CAROUSEL ===================== --}}
    @if ($socios->count())
        <section class="py-12 bg-gray-50 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 mb-8">
                <h2 class="text-center text-2xl font-bold">
                    Nuestros <em class="not-italic text-gray-400">Socios</em>
                </h2>
            </div>
            <div class="relative w-full overflow-hidden">
                <div
                    class="absolute left-0 top-0 bottom-0 w-16 sm:w-24 bg-gradient-to-r from-gray-50 to-transparent z-10 pointer-events-none">
                </div>
                <div
                    class="absolute right-0 top-0 bottom-0 w-16 sm:w-24 bg-gradient-to-l from-gray-50 to-transparent z-10 pointer-events-none">
                </div>
                <div class="flex animate-marquee" style="width: max-content; gap: 2rem;">
                    @foreach ($socios as $socio)
                        <a href="{{ $socio->link ?? '#' }}" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center justify-center flex-shrink-0 grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition duration-300"
                            style="width: 120px; height: 72px;" title="{{ $socio->empresa }}">
                            <img src="{{ asset('storage/' . $socio->logo) }}" alt="{{ $socio->empresa }}"
                                loading="lazy" class="max-h-full max-w-full object-contain">
                        </a>
                    @endforeach
                    @foreach ($socios as $socio)
                        <a href="{{ $socio->link ?? '#' }}" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center justify-center flex-shrink-0 grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition duration-300"
                            style="width: 120px; height: 72px;" title="{{ $socio->empresa }}">
                            <img src="{{ asset('storage/' . $socio->logo) }}" alt="{{ $socio->empresa }}"
                                loading="lazy" class="max-h-full max-w-full object-contain">
                        </a>
                    @endforeach
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
