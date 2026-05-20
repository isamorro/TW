@extends('layouts.app')

@section('content')
<section class="activity-create-container">

    <div class="activity-create-header">
        <h1>Editar horario</h1>
        <p>Modifica la sesión de una actividad.</p>
    </div>

    <form method="POST"
          action="{{ route('admin.sessions.update', $session) }}"
          class="activity-create-form">

        @csrf
        @method('PUT')

        <label class="activity-form-group">
            <span>Actividad</span>
            <select name="activity_id">
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}" @selected($session->activity_id == $activity->id)>
                        {{ $activity->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label class="activity-form-group">
            <span>Instalación</span>
            <select name="installation_id">
                @foreach($installations as $installation)
                    <option value="{{ $installation->id }}" @selected($session->installation_id == $installation->id)>
                        {{ $installation->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label class="activity-form-group">
            <span>Fecha</span>
            <input type="date" name="date" value="{{ $session->date->format('Y-m-d') }}">
        </label>

        <label class="activity-form-group">
            <span>Hora inicio</span>
            <input type="time" name="start_time" value="{{ $session->start_time }}">
        </label>

        <label class="activity-form-group">
            <span>Hora fin</span>
            <input type="time" name="end_time" value="{{ $session->end_time }}">
        </label>

        <div class="activity-form-actions">
            <a href="{{ route('activities.show', $session->activity) }}" class="activity-btn-secondary">
                Cancelar
            </a>

            <button class="activity-btn-primary">
                Guardar cambios
            </button>
        </div>

    </form>

</section>
@endsection