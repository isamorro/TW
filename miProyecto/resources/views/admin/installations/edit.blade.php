@extends('layouts.app')

@section('title', 'Editar instalación')

@section('content')

<section class="activity-create-container">

    <div class="activity-create-header">
        <h1>Editar instalación</h1>

        <p>
            Modifica la información de la instalación seleccionada.
        </p>
    </div>

    <form method="POST"
          action="{{ route('admin.installations.update', $installation) }}"
          class="activity-create-form">

        @csrf
        @method('PUT')

        <label class="activity-form-group">
            <span>Nombre</span>

            <input
                name="name"
                value="{{ old('name', $installation->name) }}"
                placeholder="Ej: Piscina cubierta"
            >
        </label>

        <label class="activity-form-group">
            <span>Descripción</span>

            <textarea
                name="description"
                rows="5"
                placeholder="Describe la instalación...">{{ old('description', $installation->description) }}</textarea>
        </label>

        <label class="activity-form-group">
            <span>Ruta imagen</span>

            <input
                name="image_path"
                value="{{ old('image_path', $installation->image_path) }}"
                placeholder="images/piscina.png"
            >
        </label>

        <label class="activity-form-group">
            <span>Estado</span>

            <select name="status"
                    class="w-full border rounded-xl p-4 bg-gray-50">

                <option value="available"
                    {{ old('status', $installation->status) === 'available' ? 'selected' : '' }}>
                    Disponible
                </option>

                <option value="maintenance"
                    {{ old('status', $installation->status) === 'maintenance' ? 'selected' : '' }}>
                    Mantenimiento
                </option>

            </select>
        </label>

        <div class="activity-form-actions">

            <a href="{{ route('instalaciones') }}"
               class="activity-btn-secondary">
                Cancelar
            </a>

            <button class="activity-btn-primary">
                Actualizar instalación
            </button>

        </div>

    </form>

</section>

@endsection