@extends('layouts.app')

@section('title', 'SportsCenter - Instalaciones')

@section('content')

<!-- CABECERA -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

    <div>
        <h1 class="text-4xl font-bold mb-2">
            Instalaciones
        </h1>

        <p class="text-gray-700">
            Descubre todas las instalaciones deportivas disponibles en SportsCenter.
        </p>
    </div>

    <!-- BOTÓN CREAR INSTALACIÓN -->
    @auth
        @if(auth()->user()->role === 'admin')

            <a href="{{ route('admin.installations.create') }}"
               class="inline-flex items-center gap-2 bg-brand hover:bg-brand-hover text-white px-5 py-3 rounded-xl font-bold shadow-md transition-all duration-300 hover:scale-105">

                <i class="fa-solid fa-plus"></i>

                Nueva instalación

            </a>

        @endif
    @endauth

</div>

<!-- GRID -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

    @forelse($installations as $installation)

        <article class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300 relative">

            <!-- BOTONES ADMIN -->
            @auth
                @if(auth()->user()->role === 'admin')

                    <div class="absolute top-4 right-4 flex items-center gap-2 z-10">

                        <!-- EDITAR -->
                        <a href="{{ route('admin.installations.edit', $installation) }}"
                           class="bg-blue-100 hover:bg-blue-200 text-blue-700 p-2 rounded-lg transition-colors duration-300"
                           aria-label="Editar instalación {{ $installation->name }}">

                            <i class="fa-solid fa-pen-to-square"></i>

                        </a>

                        <!-- ELIMINAR -->
                        <form action="{{ route('admin.installations.destroy', $installation) }}"
                              method="POST"
                              onsubmit="return confirm('¿Seguro que quieres eliminar esta instalación?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-300"
                                    aria-label="Eliminar instalación {{ $installation->name }}">
                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </form>

                    </div>

                @endif
            @endauth

            <!-- IMAGEN -->
            @if($installation->image_path)
                <img
                    src="{{ asset($installation->image_path) }}"
                    alt="Imagen de {{ $installation->name }}"
                    class="w-full h-56 object-cover"
                >
            @endif

            <!-- CONTENIDO -->
            <div class="p-6">

                <div class="flex items-start justify-between gap-4 mb-4">

                    <h2 class="text-2xl font-bold text-charcoal">
                        {{ $installation->name }}
                    </h2>

                    <!-- ESTADO -->
                    @if($installation->status === 'available')

                        <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full whitespace-nowrap">
                            Disponible
                        </span>

                    @else

                        <span class="bg-red-100 text-red-700 text-xs font-bold px-3 py-1 rounded-full whitespace-nowrap">
                            Mantenimiento
                        </span>

                    @endif

                </div>

                <p class="text-gray-700 leading-relaxed">
                    {{ $installation->description }}
                </p>

            </div>

        </article>

    @empty

        <div class="col-span-full">

            <div class="bg-white rounded-2xl shadow border border-gray-100 p-10 text-center">

                <i class="fa-solid fa-building text-5xl text-gray-300 mb-4"></i>

                <h2 class="text-2xl font-bold text-charcoal mb-2">
                    No hay instalaciones disponibles
                </h2>

                <p class="text-gray-700">
                    Todavía no se han añadido instalaciones al sistema.
                </p>

            </div>

        </div>

    @endforelse

</div>

@endsection