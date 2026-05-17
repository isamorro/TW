@extends('layouts.app')

@section('content')
<section class="activity-create-container">

    <div class="activity-create-header">
        <h1>Historial de reservas</h1>
        <p>Consulta todas las reservas registradas.</p>
    </div>

    <div class="activity-create-form">
        @forelse($reservations as $reservation)
            <div class="border border-gray-200 rounded-xl p-4 mb-4">
                <p><strong>Usuario:</strong> {{ $reservation->user->name }}</p>
                <p><strong>Actividad:</strong> {{ $reservation->session->activity->name ?? 'Sin actividad' }}</p>
                <p><strong>Instalación:</strong> {{ $reservation->session->installation->name ?? 'Sin instalación' }}</p>
                <p><strong>Estado:</strong> {{ $reservation->status }}</p>
                <p><strong>Fecha:</strong> {{ $reservation->created_at->format('d/m/Y H:i') }}</p>
            </div>
        @empty
            <p>No hay reservas en el historial.</p>
        @endforelse
    </div>

</section>
@endsection