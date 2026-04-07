@extends('layouts.app')

@section('title', 'Socios')

@section('content')

<style>
    .socio-card {
        background: #ffffff;
        border: 1px solid #e8edf5;
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 28px 16px 20px;
        gap: 12px;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .socio-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, #1e3a8a, #3b82f6);
        opacity: 0;
        transition: opacity 0.2s ease;
    }
    .socio-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(30, 58, 138, 0.12);
        border-color: #c7d8f5;
    }
    .socio-card:hover::before {
        opacity: 1;
    }
    .logo-circle {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: #f4f7fd;
        border: 1.5px solid #e2eaf8;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
        transition: border-color 0.2s ease;
    }
    .socio-card:hover .logo-circle {
        border-color: #93b4e8;
    }
    .logo-circle img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 8px;
    }
    .logo-initials {
        font-size: 20px;
        font-weight: 600;
        color: #93afd4;
        letter-spacing: 1px;
    }
    .socio-name {
        font-size: 11.5px;
        font-weight: 600;
        color: #1e3a8a;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        line-height: 1.4;
    }
    .social-row {
        display: flex;
        gap: 6px;
        align-items: center;
        margin-top: 2px;
    }
    .social-btn {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 1px solid #dde6f5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8fa8cc;
        text-decoration: none;
        transition: background 0.15s ease, border-color 0.15s ease, color 0.15s ease;
        flex-shrink: 0;
    }
    .social-btn:hover {
        background: #1e3a8a;
        border-color: #1e3a8a;
        color: #ffffff;
    }
    .social-btn svg {
        width: 12px;
        height: 12px;
    }
    .socios-section {
        background: #f7f9fc;
        min-height: 60vh;
    }
    .section-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #1e3a8a;
        opacity: 0.5;
    }
    @media (max-width: 1024px) { .socios-grid { grid-template-columns: repeat(4, minmax(0,1fr)) !important; } }
    @media (max-width: 768px)  { .socios-grid { grid-template-columns: repeat(3, minmax(0,1fr)) !important; } }
    @media (max-width: 480px)  { .socios-grid { grid-template-columns: repeat(1, minmax(0,1fr)) !important; } }
    
</style>

<section style="background-color: #17428C;" class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-white mb-2">Socios</h1>
        <p class="text-blue-300">Empresas asociadas a nuestra institucion.</p>
    </div>
</section>

<section class="socios-section">
    <div class="max-w-7xl mx-auto px-6 py-14">
        @if ($socios->count())
            <div style="display:grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap: 20px;"
                 class="socios-grid">
                @foreach ($socios as $socio)
                    <a href="{{ route('socios.show', $socio->id) }}" class="socio-card">
                        {{-- Logo --}}
                        <div class="logo-circle">
                            @if ($socio->logo)
                                <img src="{{ asset('storage/' . $socio->logo) }}" alt="{{ $socio->empresa }}">
                            @else
                                <span class="logo-initials">
                                    {{ strtoupper(substr($socio->empresa, 0, 2)) }}
                                </span>
                            @endif
                        </div>
                        {{-- Nombre --}}
                        <p class="socio-name">{{ $socio->empresa }}</p>
                    </a>
                @endforeach
            </div>
            <div class="mt-14">
                {{ $socios->links() }}
            </div>

        @else
            <div class="flex flex-col items-center justify-center py-28 gap-4">
                <div style="width:56px;height:56px;border-radius:50%;background:#e8edf8;display:flex;align-items:center;justify-content:center;">
                    <svg width="24" height="24" fill="none" stroke="#93afd4" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                </div>
                <p class="text-gray-400 text-sm">No hay socios registrados a¨²n.</p>
            </div>
        @endif
    </div>
</section>
@endsection
