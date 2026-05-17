@extends('layouts.app')
@section('title', 'Panel de Administración')
@section('content')

    <section class="space-y-8">

        <!-- CABECERA -->
        <div>
            <h1 class="text-4xl font-extrabold text-charcoal mb-3">
                Panel de Administración
            </h1>

            <p class="text-gray-700 text-lg">
                Desde este panel el administrador puede gestionar las actividades, instalaciones y reservas del centro deportivo.
            </p>
        </div>

        <!-- TARJETAS -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- ACTIVIDADES -->
            <article class="flex flex-col bg-white rounded-2xl shadow-lg border border-gray-100 p-8">

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-charcoal">
                        Actividades
                    </h2>

                    <i class="fa-solid fa-dumbbell text-3xl text-brand"></i>
                </div>

                <p class="text-gray-700 mb-6">
                    Crea, modifica y elimina las actividades disponibles en SportsCenter.
                </p>

                <div class="flex flex-col gap-3 mt-auto">

                    <a href="{{ route('catalogo') }}"
                    class="bg-brand hover:bg-brand-hover text-white px-5 py-3 rounded-xl font-bold text-center transition-all duration-300 min-h-20 content-center">
                        Gestionar actividades
                    </a>

                    <a href="{{ route('admin.activities.create') }}"
                    class="border border-gray-200 hover:border-brand hover:text-brand px-5 py-3 rounded-xl font-semibold text-center transition-all duration-300">
                        Crear actividad
                    </a>

                </div>

            </article>

            <!-- INSTALACIONES -->
            <article class="flex flex-col bg-white rounded-2xl shadow-lg border border-gray-100 p-8">

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-charcoal">
                        Instalaciones
                    </h2>

                    <i class="fa-solid fa-building text-3xl text-brand"></i>
                </div>

                <p class="text-gray-700 mb-6">
                    Administra las instalaciones deportivas y organiza su disponibilidad.
                </p>

                <div class="flex flex-col gap-3 mt-auto">

                    <a href="{{ route('instalaciones') }}"
                    class="bg-brand hover:bg-brand-hover text-white px-5 py-3 rounded-xl font-bold text-center transition-all duration-300 min-h-20 content-center">
                        Gestionar instalaciones
                    </a>

                    <a href="{{ route('admin.installations.create') }}"
                    class="border border-gray-200 hover:border-brand hover:text-brand px-5 py-3 rounded-xl font-semibold text-center transition-all duration-300">
                        Crear instalación
                    </a>

                </div>

            </article>

            <!-- RESERVAS -->
            <article class="flex flex-col bg-white rounded-2xl shadow-lg border border-gray-100 p-8">

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-charcoal">
                        Reservas
                    </h2>

                    <i class="fa-solid fa-calendar-check text-3xl text-brand"></i>
                </div>

                <p class="text-gray-700 mb-6">
                    Gestiona la reserva de pistas o sesiones, bloqueando plazas para otros usuarios y consultando el historial de reservas.
                </p>

                <div class="flex flex-col gap-3 mt-auto">

                    <a href="{{ route('admin.reservations.index') }}"
                    class="bg-brand hover:bg-brand-hover text-white px-5 py-3 rounded-xl font-bold text-center transition-all duration-300 min-h-20 content-center">
                        Gestionar reservas
                    </a>

                    <a href="{{ route('admin.reservations.history') }}"
                    class="border border-gray-200 hover:border-brand hover:text-brand px-5 py-3 rounded-xl font-semibold text-center transition-all duration-300">
                        Ver historial
                    </a>

                </div>

            </article>

        </div>

    </section>

@endsection