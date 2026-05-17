@extends('layouts.app')

@section('content')

<section class="activity-create-container">

    <div class="activity-create-header">
        <h1>Editar actividad</h1>

        <p>
            Modifica la información de la actividad deportiva.
        </p>
    </div>

    <form method="POST"
          action="{{ route('admin.activities.update', ['activity' => $activity->id]) }}"
          class="activity-create-form">

        @csrf
        @method('PUT')

        <label class="activity-form-group">

            <span>Nombre</span>

            <input
                name="name"
                value="{{ old('name', $activity->name) }}"
                placeholder="Ej: Yoga"
            >

        </label>

        <label class="activity-form-group">

            <span>Descripción</span>

            <textarea
                name="description"
                rows="5"
                placeholder="Describe la actividad...">{{ old('description', $activity->description) }}</textarea>

        </label>

        <label class="activity-form-group">

            <span>Capacidad</span>

            <input
                type="number"
                name="capacity"
                value="{{ old('capacity', $activity->capacity) }}"
                placeholder="Ej: 20"
            >

        </label>

        <label class="activity-form-group">

            <span>Ruta imagen</span>

            <input
                name="image_path"
                value="{{ old('image_path', $activity->image_path) }}"
                placeholder="images/yoga.png"
            >

        </label>

        <div class="activity-form-actions">

            <a href="{{ route('catalogo') }}"
               class="activity-btn-secondary">
                Cancelar
            </a>

            <button class="activity-btn-primary">
                Actualizar actividad
            </button>

        </div>

    </form>

</section>

@endsection