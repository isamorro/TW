@extends('login.layout')

@section('title', 'Perfil')

@section('header-action')
@endsection

@section('content')

<div class="mb-6 pb-6 border-b border-gray-100 text-center">
    <h1 class="text-3xl font-extrabold tracking-tight text-charcoal">Hola, {{ auth()->user()->name }}</h1>
    <p class="mt-2 text-sm text-charcoal-light font-medium">{{ auth()->user()->email }}</p>
</div>

<div class="space-y-4">
    <div class="rounded-xl border border-green-100 bg-green-50 p-6 flex flex-col items-center text-center shadow-sm">

        @if (auth()->user()->role === 'admin')
            <i class="fa-solid fa-shield-halved text-brand text-3xl mb-3"></i>
            <p class="text-lg font-bold text-charcoal">Administrador</p>
            <p class="mt-1 text-sm text-charcoal-light">Tienes acceso a las herramientas de gestión.</p>
            <a href="{{ route('admin.panel') }}" class="mt-5 inline-flex items-center justify-center rounded-xl bg-brand px-6 py-3 text-sm font-bold text-white shadow-md transition-all hover:bg-brand-hover hover:scale-[1.02]">
                Ir al panel de administración
            </a>
        @else
            <i class="fa-solid fa-bolt text-brand text-3xl mb-3"></i>
            <p class="text-lg font-bold text-charcoal">Usuario Activo</p>
            <p class="mt-1 text-sm text-charcoal-light">Gestiona tus próximas instalaciones y clases.</p>
            <a href="{{ route('reservas') }}" class="mt-5 inline-flex items-center justify-center rounded-xl bg-brand px-6 py-3 text-sm font-bold text-white shadow-md transition-all hover:bg-brand-hover hover:scale-[1.02]">
                Ver mis reservas
            </a>
        @endif
    </div>

    <form action="{{ route('logout') }}" method="POST" class="pt-4">
        @csrf
        <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl border-2 border-gray-200 bg-white px-4 py-3 text-sm font-bold text-charcoal shadow-sm transition-all hover:border-gray-300 hover:bg-gray-50 hover:text-red-500">
            <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Cerrar sesión
        </button>
    </form>
</div>

@endsection