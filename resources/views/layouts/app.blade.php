<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection('title')
            @yield('title') | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-800 font-sans">

    {{-- NAVBAR --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 object-contain">
            </a>

            {{-- Navegación desktop --}}
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-600">
                <a href="{{ url('/') }}" class="hover:text-black transition">Inicio</a>
                <a href="{{ url('/nosotros') }}" class="hover:text-black transition">Nosotros</a>
                {{-- Publicaciones --}}
                <div x-data="{ open: false }" class="relative">
                    <a href="{{ url('/publicaciones') }}" @mouseenter="open = true" @mouseleave="open = false"
                        class="hover:text-black transition flex items-center gap-1">
                        Publicaciones
                        {{-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg> --}}
                    </a>
                    <div x-show="open" @mouseenter="open = true" @mouseleave="open = false" x-transition
                        class="absolute left-0 mt-2 w-44 bg-white shadow-lg rounded-lg py-2 z-50">
                        <a href="{{ url('/revista') }}" class="block px-4 py-2 hover:bg-gray-100">
                            Revistas
                        </a>
                        <a href="{{ url('/noticias') }}" class="block px-4 py-2 hover:bg-gray-100">
                            Noticias
                        </a>
                        <a href="{{ url('/boletines') }}" class="block px-4 py-2 hover:bg-gray-100">
                            Boletines
                        </a>
                    </div>
                </div>
                <a href="{{ url('/socios') }}" class="hover:text-black transition">Asociados</a>
                {{-- Actividades --}}
                <div x-data="{ open: false }" class="relative">
                    <span @mouseenter="open = true" @mouseleave="open = false"
                        class="hover:text-black transition flex items-center gap-1">
                        Actividades
                    </span>
                    <div x-show="open" @mouseenter="open = true" @mouseleave="open = false" x-transition
                        class="absolute left-0 mt-2 w-44 bg-white shadow-lg rounded-lg py-2 z-50">
                        <a href="{{ url('/eventos') }}" class="block px-4 py-2 hover:bg-gray-100">
                            Eventos
                        </a>

                        <a href="{{ url('/galeria') }}" class="block px-4 py-2 hover:bg-gray-100">
                            Galería
                        </a>
                    </div>
                </div>
                @auth('empresa')
                    <a href="/exclusivo">Exclusivo</a>
                @endauth
            </nav>

            @guest('empresa')
                <a href="{{ url('/asociacion') }}"
                    class="hidden md:inline-block bg-black text-white text-sm font-semibold px-5 py-2 rounded-full hover:bg-gray-800 transition">
                    Asóciate
                </a>
            @endguest
            @auth('empresa')
                <form method="POST" action="/logout" class="inline-block">
                    @csrf
                    <button type="submit"
                        class="hidden md:inline-block bg-black text-white text-sm font-semibold px-5 py-2 rounded-full hover:bg-gray-800 transition">
                        Cerrar sesión
                    </button>
                </form>
            @endauth

            {{-- Botón hamburguesa mobile --}}
            <button id="menu-toggle" class="md:hidden text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Menú mobile --}}
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t px-4 pb-4">
            <nav class="flex flex-col gap-3 text-sm font-medium text-gray-600 mt-3">
                <a href="{{ url('/') }}" class="hover:text-black">Inicio</a>
                <a href="{{ url('/nosotros') }}" class="hover:text-black">Nosotros</a>
                <a href="{{ url('/socios') }}" class="hover:text-black">Socios</a>
                <a href="{{ url('/directorio') }}" class="hover:text-black">Directorio</a>
                <a href="{{ url('/noticias') }}" class="hover:text-black">Noticias</a>
                <a href="{{ url('/eventos') }}" class="hover:text-black">Eventos</a>
                <a href="{{ url('/revista') }}" class="hover:text-black">Revista</a>
                <a href="{{ url('/galeria') }}" class="hover:text-black">Galería</a>
                @auth
                    @if (auth()->user()->tipo === 'empresa')
                        <a href="/exclusivo">Exclusivo</a>
                    @endif
                @endauth
                <a href="{{ url('/contacto') }}" class="hover:text-black">Contáctanos</a>
            </nav>
        </div>
    </header>

    {{-- CONTENIDO PRINCIPAL --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Columna 1: Logo y descripción --}}
            <div>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 mb-4 object-contain">
                </a>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Congregamos a las empresas del sector y difundimos el valor de nuestra industria.
                </p>
            </div>

            {{-- Columna 2: Menú --}}
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-widest text-gray-300 mb-4">Menú</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ url('/nosotros') }}" class="hover:text-white transition">Nosotros</a></li>
                    <li><a href="{{ url('/socios') }}" class="hover:text-white transition">Socios</a></li>
                    <li><a href="{{ url('/directorio') }}" class="hover:text-white transition">Directorio</a></li>
                    <li><a href="{{ url('/noticias') }}" class="hover:text-white transition">Noticias</a></li>
                    <li><a href="{{ url('/eventos') }}" class="hover:text-white transition">Eventos</a></li>
                    <li><a href="{{ url('/revista') }}" class="hover:text-white transition">Revista</a></li>
                    <li><a href="{{ url('/galeria') }}" class="hover:text-white transition">Galería</a></li>
                    <li><a href="{{ url('/login-empresas') }}" class="hover:text-white transition">Acceso Socios</a>
                    </li>
                </ul>
            </div>

            {{-- Columna 3: Suscripción newsletter --}}
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-widest text-gray-300 mb-4">Newsletter</h4>
                <p class="text-sm text-gray-400 mb-4">Suscríbete para recibir las últimas noticias.</p>
                <div class="flex gap-2">
                    <input type="email" id="footer-email" placeholder="Tu correo"
                        class="flex-1 px-3 py-2 rounded-lg bg-gray-800 text-white text-sm placeholder-gray-500 border border-gray-700 focus:outline-none focus:border-gray-400">
                    <button onclick="suscribirFooter()"
                        class="bg-white text-gray-900 text-sm font-semibold px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                        OK
                    </button>
                </div>
                <p id="footer-msg" class="mt-2 text-xs hidden"></p>
            </div>

            <script>
                function suscribirFooter() {
                    const email = document.getElementById('footer-email').value;
                    const msg = document.getElementById('footer-msg');

                    if (!email) {
                        msg.textContent = 'Ingresa tu correo.';
                        msg.className = 'mt-2 text-xs text-yellow-400';
                        msg.classList.remove('hidden');
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
                            msg.className = 'mt-2 text-xs ' + (data.success ? 'text-green-400' : 'text-red-400');
                            msg.classList.remove('hidden');

                            if (data.success) {
                                document.getElementById('footer-email').value = '';
                            }
                        });
                }
            </script>

            {{-- Barra inferior --}}
            <div class="border-t border-gray-800 text-center py-4 text-xs text-gray-500">
                &copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
            </div>
    </footer>

    {{-- Script menú mobile --}}
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>

</html>
