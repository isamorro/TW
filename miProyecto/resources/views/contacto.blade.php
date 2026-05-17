@extends('layouts.app')
@section('title', 'SportsCenter - Contacto')
@section('content')

<section class="max-w-5xl mx-auto px-4 py-16">

    <div class="text-center mb-10">
        <span class="inline-block bg-green-100 text-brand font-bold px-4 py-2 rounded-full mb-4">
            SportsCenter
        </span>

        <h1 class="text-4xl md:text-5xl font-extrabold text-charcoal mb-4">
            Equipo de desarrollo
        </h1>

        <p class="text-gray-700 text-lg max-w-2xl mx-auto">
            Proyecto desarrollado para la gestión de actividades, instalaciones y reservas de un centro deportivo.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <article class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 text-center hover:shadow-xl transition-all">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-brand text-white flex items-center justify-center text-2xl font-extrabold">
                C
            </div>

            <h2 class="text-lg font-bold text-charcoal">
                Carlos Hoyo Liddle
            </h2>

            <p class="text-sm text-gray-700 mt-2">
                Desarrollador
            </p>
        </article>

        <article class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 text-center hover:shadow-xl transition-all">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-brand text-white flex items-center justify-center text-2xl font-extrabold">
                D
            </div>

            <h2 class="text-lg font-bold text-charcoal">
                David Martin Cerezo
            </h2>

            <p class="text-sm text-gray-700 mt-2">
                Desarrollador
            </p>
        </article>

        <article class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 text-center hover:shadow-xl transition-all">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-brand text-white flex items-center justify-center text-2xl font-extrabold">
                L
            </div>

            <h2 class="text-lg font-bold text-charcoal">
                Leandro Mazuecos Martín
            </h2>

            <p class="text-sm text-gray-700 mt-2">
                Desarrollador
            </p>
        </article>

        <article class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 text-center hover:shadow-xl transition-all">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-brand text-white flex items-center justify-center text-2xl font-extrabold">
                I
            </div>

            <h2 class="text-lg font-bold text-charcoal">
                Isabel Morro Tabares
            </h2>

            <p class="text-sm text-gray-700 mt-2">
                Desarrolladora
            </p>
        </article>

    </div>

</section>
@endsection