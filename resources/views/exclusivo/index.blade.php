@extends('layouts.app')

@section('title', 'Exclusivo')

@section('content')
    <h1>Zona Exclusiva</h1>

    <div style="display:grid; grid-template-columns: repeat(3,1fr); gap:20px;">

        @foreach ($exclusivos as $item)
            <div style="border-radius:10px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.1);">

                @if ($item->imagen)
                    <img src="{{ asset('storage/' . $item->imagen) }}" style="width:100%; height:200px; object-fit:cover;">
                @endif

                <div style="padding:15px;">
                    <h3>{{ $item->titulo }}</h3>

                    <p>{{ $item->contenido }}</p>

                    @if ($item->docs)
                        <a href="{{ asset('storage/' . $item->docs) }}" target="_blank">
                            📄 Ver documento
                        </a>
                    @endif
                </div>

            </div>
        @endforeach

    </div>
@endsection
