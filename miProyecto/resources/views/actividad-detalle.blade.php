@extends('layouts.app')
@section('title', $activity->name)
@section('content')

<article class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">

    @if($activity->image_path)
        <img 
            src="{{ asset($activity->image_path) }}"
            alt="Imagen de la actividad {{ $activity->name }}"
            class="w-full h-80 object-cover"
        >
    @endif

    <div class="p-8">
        <a href="{{ route('catalogo') }}"
           class="inline-block mb-6 text-brand font-semibold hover:underline">
            ← Volver al catálogo
        </a>

        <h1 class="text-4xl font-extrabold mb-4 text-charcoal">
            {{ $activity->name }}
        </h1>

        <p class="text-gray-700 text-lg mb-6">
            {{ $activity->description }}
        </p>

        <p class="text-brand font-bold text-xl">
            Plazas disponibles: {{ $activity->capacity }}
        </p>
    </div>

    <p> AÑADIR HORARIO AQUI </p>
    <p> AÑADIR BOTÓN A RESERVAS AQUI </p>

</article>

@endsection