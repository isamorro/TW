@extends('layouts.app')

@section('title', 'Mis Reservas')

@section('content')
<!-- CABECERA -->
<div class="mb-8">
    <h1 class="text-4xl font-bold mb-2">Mis reservas</h1>
    <p class="text-gray-600">
        Aquí puedes consultar y gestionar tus reservas activas y pasadas.
    </p>
</div>

<!-- MENSAJES -->
@if (session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-6" role="alert">
        <i class="fa-solid fa-circle-check mr-2"></i>
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-6" role="alert">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- LISTADO -->
@if ($reservations->isEmpty())
    <div class="bg-white rounded-xl shadow p-8 border text-center">
        <i class="fa-solid fa-calendar-xmark text-5xl text-gray-300 mb-4"></i>
        <p class="text-gray-600 mb-6">No tienes ninguna reserva todavía.</p>
        <a href="{{ route('catalogo') }}"
           class="inline-flex items-center gap-2 bg-brand hover:bg-brand-hover text-white px-5 py-3 rounded-xl font-bold shadow-md transition-all duration-300 hover:scale-105">
            <i class="fa-solid fa-magnifying-glass"></i>
            Ver catálogo de actividades
        </a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($reservations as $reservation)
            <article class="bg-white rounded-xl shadow p-6 border relative">
                <!-- ESTADO -->
                <div class="absolute top-4 right-4">
                    @if ($reservation->status === 'active')
                        <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">
                            Activa
                        </span>
                    @elseif ($reservation->status === 'cancelled')
                        <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">
                            Cancelada
                        </span>
                    @else
                        <span class="inline-block bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs font-semibold">
                            Completada
                        </span>
                    @endif
                </div>

                <!-- ACTIVIDAD -->
                <h2 class="text-2xl font-semibold mb-1 pr-24">
                    {{ $reservation->session->activity->name }}
                </h2>
                <p class="text-gray-600 mb-4">
                    <i class="fa-solid fa-location-dot mr-1 text-brand"></i>
                    {{ $reservation->session->installation->name }}
                </p>

                <!-- FECHA Y HORA -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6 text-gray-700 mb-5">
                    <p>
                        <i class="fa-solid fa-calendar mr-1 text-brand"></i>
                        {{ $reservation->session->date->format('d/m/Y') }}
                    </p>
                    <p>
                        <i class="fa-solid fa-clock mr-1 text-brand"></i>
                        {{ \Carbon\Carbon::parse($reservation->session->start_time)->format('H:i') }}
                        –
                        {{ \Carbon\Carbon::parse($reservation->session->end_time)->format('H:i') }}
                    </p>
                </div>

                <!-- ACCIÓN CANCELAR -->
                @if ($reservation->status === 'active')
                    <form action="{{ route('reservas.destroy', $reservation) }}"
                          method="POST"
                          onsubmit="return confirm('¿Seguro que quieres cancelar esta reserva?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center gap-2 bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded-lg font-bold transition-colors duration-300">
                            <i class="fa-solid fa-xmark"></i>
                            Cancelar reserva
                        </button>
                    </form>
                @endif
            </article>
        @endforeach
    </div>
@endif
@endsection