@extends('layouts.app')
@section('title', 'SportsCenter -Confirmar Reserva')
@section('content')

<!-- CABECERA -->
<div class="mb-8">
    <h1 class="text-4xl font-bold mb-2">Confirmar reserva</h1>
    <p class="text-gray-700">
        Revisa los detalles antes de confirmar.
    </p>
</div>

<!-- ERRORES -->
@if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-6" role="alert">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- TARJETA DE DETALLES -->
<article class="bg-white rounded-xl shadow p-6 border mb-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-1">
        {{ $session->activity->name }}
    </h2>
    <p class="text-gray-700 mb-6">
        <i class="fa-solid fa-location-dot mr-1 text-brand"></i>
        {{ $session->installation->name }}
    </p>

    <div class="grid sm:grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-sm text-gray-700 uppercase font-semibold mb-1">Fecha</p>
            <p class="text-lg font-medium">
                <i class="fa-solid fa-calendar mr-1 text-brand"></i>
                {{ $session->date->format('d/m/Y') }}
            </p>
        </div>
        <div>
            <p class="text-sm text-gray-700 uppercase font-semibold mb-1">Hora</p>
            <p class="text-lg font-medium">
                <i class="fa-solid fa-clock mr-1 text-brand"></i>
                {{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }}
                –
                {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}
            </p>
        </div>
    </div>

    <div class="border-t border-gray-200 pt-4">
        <p class="text-sm text-gray-700 uppercase font-semibold mb-1">Plazas disponibles</p>
        <p class="text-2xl font-bold {{ $plazasLibres > 0 ? 'text-brand' : 'text-red-600' }}">
            {{ $plazasLibres }}
            <span class="text-base font-medium text-gray-700">de {{ $session->activity->capacity }}</span>
        </p>
    </div>
</article>

@if ($plazasLibres <= 0)
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-6 max-w-3xl">
        <i class="fa-solid fa-circle-exclamation mr-2"></i>
        Esta sesión está completa. No quedan plazas disponibles.
    </div>
    <a href="{{ route('catalogo') }}"
       class="inline-flex items-center gap-2 border-2 border-gray-200 bg-white text-charcoal px-5 py-3 rounded-xl font-bold transition-all duration-300 hover:border-brand hover:text-brand">
        <i class="fa-solid fa-arrow-left"></i>
        Volver al catálogo
    </a>
@else
    <form action="{{ route('reservas.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-3xl">
        @csrf
        <input type="hidden" name="session_id" value="{{ $session->id }}" required>

        <button type="submit"
                class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-hover text-white px-5 py-3 rounded-xl font-bold shadow-md transition-all duration-300 hover:scale-105">
            <i class="fa-solid fa-check"></i>
            Confirmar reserva
        </button>
        <a href="{{ route('catalogo') }}"
           class="inline-flex items-center justify-center gap-2 border-2 border-gray-200 bg-white text-charcoal px-5 py-3 rounded-xl font-bold transition-all duration-300 hover:border-brand hover:text-brand">
            <i class="fa-solid fa-arrow-left"></i>
            Volver al catálogo
        </a>
    </form>
@endif
@endsection