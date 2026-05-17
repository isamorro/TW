@extends('layouts.app')
@section('title', 'SportsCenter - Catálogo')
@section('content')

<!-- CABECERA -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

    <div>
        <h1 class="text-4xl font-bold mb-2">
            Catálogo de clases
        </h1>

        <p class="text-gray-700">
            Consulta las actividades disponibles en nuestro centro deportivo.
        </p>
    </div>

    <!-- BOTÓN CREAR ACTIVIDAD -->
    @auth
        @if(auth()->user()->role === 'admin')

            <a href="{{ route('admin.activities.create') }}"
               class="inline-flex items-center gap-2 bg-brand hover:bg-brand-hover text-white px-5 py-3 rounded-xl font-bold shadow-md transition-all duration-300 hover:scale-105">
                <i class="fa-solid fa-plus"></i>
                Nueva actividad
            </a>

        @endif
    @endauth

</div>

<!-- GRID ACTIVIDADES -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse($activities as $activity)

        <article id="activity-{{ $activity->id }}"
                 class="bg-white rounded-xl shadow p-6 border scroll-mt-28 relative">

            <!-- BOTONES ADMIN -->
            @auth
                @if(auth()->user()->role === 'admin')
                    <div class="absolute top-4 right-4 flex items-center gap-2">
                        <!-- EDITAR -->
                        <a href="{{ route('admin.activities.edit', $activity) }}"
                           class="bg-blue-100 hover:bg-blue-200 text-blue-700 p-2 rounded-lg transition-colors duration-300"
                           aria-label="Editar actividad {{ $activity->name }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <!-- ELIMINAR -->
                        <form action="{{ route('admin.activities.destroy', $activity) }}"
                              method="POST"
                              onsubmit="return confirm('¿Seguro que quieres eliminar esta actividad?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-300"
                                    aria-label="Eliminar actividad {{ $activity->name }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endif
            @endauth

            <!-- IMAGEN -->
            @if($activity->image_path)
                <img 
                    src="{{ asset($activity->image_path) }}" 
                    alt="Imagen de la actividad {{ $activity->name }}"
                    class="w-full h-48 object-cover rounded-lg mb-4"
                >
            @endif

            <!-- CONTENIDO -->
            <h2 class="text-2xl font-semibold mb-2">
                {{ $activity->name }}
            </h2>

            <p class="text-gray-700 mb-4">
                {{ $activity->description }}
            </p>

            <p class="font-medium text-brand">
                Plazas disponibles: {{ $activity->capacity }}
            </p>

            <!-- DETALLE -->
            <a href="{{ route('activities.show', $activity) }}"
               class="inline-block mt-4 bg-brand hover:bg-brand-hover text-white px-4 py-2 rounded-lg font-bold transition-colors">
                Ver detalle
            </a>

        </article>

    @empty

        <p class="text-gray-700">
            Todavía no hay actividades disponibles.
        </p>

    @endforelse

</div>

@endsection