@extends('layouts.app')

@section('title', 'Crear instalación')

@section('content')

<section class="activity-create-container">

    <div class="activity-create-header">
        <h1>Crear instalación</h1>

        <p>
            Añade una nueva instalación deportiva al sistema.
        </p>
    </div>

    <form method="POST"
          action="{{ route('admin.installations.store') }}"
          class="activity-create-form">

        @csrf

        <label class="activity-form-group">
            <span>Nombre</span>

            <input
                name="name"
                value="{{ old('name') }}"
                placeholder="Ej: Piscina cubierta"
            >
        </label>

        <label class="activity-form-group">
            <span>Descripción</span>

            <textarea
                name="description"
                rows="5"
                placeholder="Describe la instalación...">{{ old('description') }}</textarea>
        </label>

        <label class="activity-form-group">
            <span>Ruta imagen</span>

            <input
                name="image_path"
                value="{{ old('image_path') }}"
                placeholder="images/piscina.png"
            >
        </label>

        <label class="activity-form-group">
            <span>Estado</span>

            <select name="status"
                    class="w-full border rounded-xl p-4 bg-gray-50">

                <option value="available">
                    Disponible
                </option>

                <option value="maintenance">
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
                Guardar instalación
            </button>

        </div>

    </form>

</section>

@endsection