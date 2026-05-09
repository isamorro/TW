@extends('layouts.app')

@section('content')
<section class="max-w-3xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Editar actividad</h1>

    <form method="POST"
      action="{{ route('admin.activities.update', ['activity' => $activity->id]) }}"
      class="activity-create-form">
        @csrf
        @method('PUT')

        <label class="block">
            <span>Nombre</span>
            <input name="name" class="w-full border rounded p-2" value="{{ old('name', $activity->name) }}">
        </label>

        <label class="block">
            <span>Descripción</span>
            <textarea name="description" class="w-full border rounded p-2">{{ old('description', $activity->description) }}</textarea>
        </label>

        <label class="block">
            <span>Capacidad</span>
            <input type="number" name="capacity" class="w-full border rounded p-2" value="{{ old('capacity', $activity->capacity) }}">
        </label>

        <label class="block">
            <span>Ruta imagen</span>
            <input name="image_path" class="w-full border rounded p-2" value="{{ old('image_path', $activity->image_path) }}">
        </label>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Actualizar
        </button>
    </form>
</section>
@endsection