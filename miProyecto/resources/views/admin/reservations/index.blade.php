@extends('layouts.app')

@section('content')
<section class="activity-create-container">

    <div class="activity-create-header">
        <h1>Gestionar reservas</h1>
        <p>Consulta y cancela reservas activas.</p>
    </div>

    <div class="activity-create-form">

        @forelse($reservations as $reservation)
            <div class="border border-gray-200 rounded-xl p-4 mb-4">
                <p><strong>Usuario:</strong> {{ $reservation->user->name }}</p>
                <p><strong>Actividad:</strong> {{ $reservation->session->activity->name ?? 'Sin actividad' }}</p>
                <p><strong>Instalación:</strong> {{ $reservation->session->installation->name ?? 'Sin instalación' }}</p>
                <p><strong>Estado:</strong> {{ $reservation->status }}</p>
                <form method="POST"
                      action="{{ route('admin.reservations.destroy', $reservation) }}"
                      class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button class="activity-btn-primary">
                        Cancelar reserva
                    </button>
                </form>
            </div>
        @empty
            <p>No hay reservas activas.</p>
        @endforelse

    </div>

</section>
@endsection