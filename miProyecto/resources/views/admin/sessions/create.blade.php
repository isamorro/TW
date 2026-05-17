@extends('layouts.app')

@section('content')
<section class="activity-create-container">

    <div class="activity-create-header">
        <h1>Añadir sesión</h1>
        <p>Programa una nueva sesión para una actividad.</p>
    </div>

    <form method="POST"
          action="{{ route('admin.sessions.store') }}"
          class="activity-create-form">

        @csrf

        <label class="activity-form-group">
            <span>Actividad</span>

            <select name="activity_id">
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}"
                        @selected($selectedActivityId == $activity->id)>
                        {{ $activity->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label class="activity-form-group">
            <span>Instalación</span>

            <select name="installation_id">
                @foreach($installations as $installation)
                    <option value="{{ $installation->id }}">
                        {{ $installation->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label class="activity-form-group">
            <span>Fecha</span>
            <input type="date" name="date" value="{{ old('date') }}">
        </label>

        <label class="activity-form-group">
            <span>Hora inicio</span>
            <input type="time" name="start_time" value="{{ old('start_time') }}">
        </label>

        <label class="activity-form-group">
            <span>Hora fin</span>
            <input type="time" name="end_time" value="{{ old('end_time') }}">
        </label>

        <div class="activity-form-actions">
            <a href="{{ route('catalogo') }}" class="activity-btn-secondary">
                Cancelar
            </a>

            <button class="activity-btn-primary">
                Guardar sesión
            </button>
        </div>

    </form>

</section>
@endsection