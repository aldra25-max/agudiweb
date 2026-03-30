@extends('layouts.app')

@section('title', 'Asociarse')

@section('content')
    <div class="min-h-screen bg-gray-50 py-10">
        <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8">
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-3xl font-bold mb-6 text-gray-800">
                Formulario de Asociación
            </h1>

            <form action="{{ route('asociacion.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- EMPRESA -->
                <div>
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">🏢 Datos de la Empresa</h2>

                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" name="razon_social" placeholder="Razón Social" class="input" required>
                        <input type="text" name="ruc" id="ruc" placeholder="RUC" class="input" required>
                        <p id="ruc-error" class="text-red-500 text-sm mt-1 hidden">
                            El RUC ya está registrado
                        </p>
                        <input type="text" name="direccion" placeholder="Dirección" class="input md:col-span-2" required>

                        <input type="email" name="correo" placeholder="Correo" class="input" required>
                        <input type="tel" name="telefono" placeholder="Teléfono" class="input" required>
                    </div>
                </div>

                <!-- REPRESENTANTE -->
                <div>
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">👤 Representante Legal</h2>

                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" name="representante_legal" placeholder="Nombre completo" class="input"
                            required>
                        <input type="tel" name="celular_representante" placeholder="Celular" class="input" required>
                        <input type="email" name="email_representante" placeholder="Email" class="input" required>
                    </div>
                </div>

                <!-- CONTACTO -->
                <div>
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">📞 Contacto en la Empresa</h2>

                    <div id="contactos" class="space-y-3">
                        <div class="grid md:grid-cols-3 gap-3">
                            <input type="text" name="contactos[0][nombre]" placeholder="Nombre" class="input" required>
                            <input type="tel" name="contactos[0][telefono]" placeholder="Teléfono" class="input"
                                required>
                            <input type="email" name="contactos[0][correo]" placeholder="Correo" class="input" required>
                        </div>
                    </div>

                    <button type="button" onclick="agregarContacto()" class="btn-secondary mt-3">
                        + Agregar contacto
                    </button>
                </div>

                <!-- MAQUINARIAS -->
                <div>
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">⚙️ Maquinarias (2)</h2>

                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" name="maquinarias[]" placeholder="Maquinaria 1" class="input" required>
                        <input type="text" name="maquinarias[]" placeholder="Maquinaria 2" class="input" required>
                    </div>
                </div>

                <!-- SERVICIOS -->
                <div>
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">🛠️ Servicios / Productos (5)</h2>

                    <div class="grid md:grid-cols-2 gap-4">
                        @for ($i = 0; $i < 5; $i++)
                            <input type="text" name="servicios[]" placeholder="Servicio {{ $i + 1 }}"
                                class="input" required>
                        @endfor
                    </div>
                </div>

                <!-- BOTÓN -->
                <div class="text-right">
                    <button type="submit" class="btn-primary">
                        Enviar solicitud
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- estilos -->
    <style>
        .input {
            @apply w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none;
        }

        .btn-primary {
            @apply bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition;
        }

        .btn-secondary {
            @apply bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300 transition;
        }
    </style>

    <!-- script -->
    <script>
        let index = 1;

        function agregarContacto() {
            const container = document.getElementById('contactos');

            const html = `
        <div class="grid md:grid-cols-3 gap-3">
            <input type="text" name="contactos[${index}][nombre]" placeholder="Nombre" class="input" required>
            <input type="tel" name="contactos[${index}][telefono]" placeholder="Teléfono" class="input" required>
            <input type="email" name="contactos[${index}][correo]" placeholder="Correo" class="input" required>
        </div>
    `;

            container.insertAdjacentHTML('beforeend', html);
            index++;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const rucInput = document.getElementById('ruc');
            const errorMsg = document.getElementById('ruc-error');

            let timeout = null;

            rucInput.addEventListener('input', function() {

                clearTimeout(timeout);

                let ruc = this.value;

                if (ruc.length !== 11) {
                    errorMsg.classList.add('hidden');
                    return;
                }

                timeout = setTimeout(() => {

                    fetch('/validar-ruc?ruc=' + ruc)
                        .then(res => res.json())
                        .then(data => {

                            console.log(data); // 👈 IMPORTANTE (debug)

                            if (data.exists) {
                                errorMsg.classList.remove('hidden');
                                rucInput.style.border = "2px solid red";
                            } else {
                                errorMsg.classList.add('hidden');
                                rucInput.style.border = "";
                            }

                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });

                }, 500);
            });

        });
    </script>


@endsection
