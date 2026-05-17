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

        <a href="{{ route('catalogo') }}" class="inline-block mb-6 text-brand font-semibold hover:underline">
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

        <!-- SESIONES DISPONIBLES -->
        <div class="mt-10 pt-8 border-t border-gray-200">
            <h2 class="text-2xl font-semibold mb-4">
                <i class="fa-solid fa-calendar-days text-brand mr-1"></i>
                Sesiones disponibles
            </h2>

            @php
                $sesionesFuturas = $activity->sessions
                    ->where('date', '>=', now()->format('Y-m-d'))
                    ->sortBy('date');
            @endphp

            @if ($sesionesFuturas->isEmpty())
                <p class="text-gray-600">No hay sesiones programadas para esta actividad.</p>
            @else
                <div class="grid grid-cols-1 gap-3">
                    @foreach ($sesionesFuturas as $session)
                        <article class="bg-gray-50 rounded-xl p-4 border border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <p class="font-semibold text-charcoal">
                                    <i class="fa-solid fa-calendar mr-1 text-brand"></i>
                                    {{ \Carbon\Carbon::parse($session->date)->format('d/m/Y') }}
                                    <span class="mx-1 text-gray-400">·</span>
                                    <i class="fa-solid fa-clock mr-1 text-brand"></i>
                                    {{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }}–{{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}
                                </p>
                                <p class="text-sm text-gray-600 mt-1">
                                    <i class="fa-solid fa-location-dot mr-1 text-brand"></i>
                                    {{ $session->installation->name }}
                                    <span class="mx-1 text-gray-400">·</span>
                                    Plazas: {{ $session->reservations->where('status', 'active')->count() }} / {{ $activity->capacity }}
                                </p>
                            </div>
                            @auth
                                <a href="{{ route('reservas.create', $session) }}"
                                   class="inline-flex items-center gap-2 bg-brand hover:bg-brand-hover text-white px-4 py-2 rounded-lg font-bold transition-colors text-center justify-center">
                                    <i class="fa-solid fa-calendar-check"></i>
                                    Reservar
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center gap-2 text-brand hover:text-brand-hover font-bold transition-colors text-center justify-center">
                                    Inicia sesión para reservar
                                </a>
                            @endauth
                        </article>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

</article>
@endsection