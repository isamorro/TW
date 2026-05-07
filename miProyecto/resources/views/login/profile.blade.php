@extends('login.layout')

@section('title', 'Perfil')

@section('header-action')
<a href="{{ route('home') }}" class="inline-flex h-9 w-9 items-center justify-center rounded border border-emerald-200 bg-white text-emerald-700 shadow-sm transition hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-800" aria-label="Volver al inicio">
    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M3 11l9-8 9 8"></path>
        <path d="M5 10v10h14V10"></path>
    </svg>
</a>
@endsection

@section('content')

<div class="mb-6 pb-6 bordear-b border-slate-100">
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Hola, {{ auth()->user()->name }}</h1>
    <p class="mt-1 text-sm text-slate-500">{{ auth()->user()->email }}</p>
</div>

<div class="space-y-4">
    <div class="rounded border border-emerald-100 bg-emerald-50/50 p-4">

        @if (auth()->user()->role === 'admin')
            <p class="text-base font-semibold text-emerald-900">Administrador</p>
            <p class="mt-1 text-sm text-emerald-700">Tienes acceso a las herramientas de gestión.</p>
            <a href="{{ route('admin.panel') }}" class="mt-4 inline-flex items-center justify-center rounded bg-emerald-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                Ir al panel de administración
            </a>
        @else
            <p class="text-base font-semibold text-emerald-900">Usuario Activo</p>
            <p class="mt-1 text-sm text-emerald-700">Gestiona tus próximas instalaciones reservadas.</p>
            <a href="{{ route('reservas') }}" class="mt-4 inline-flex items-center justify-center rounded bg-emerald-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                Ver mis reservas
            </a>
        @endif
    </div>

    <form action="{{ route('logout') }}" method="POST" class="pt-2">
        @csrf
        <button type="submit" class="inline-flex w-full items-center justify-center rounded border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
            Cerrar sesión
        </button>
    </form>
</div>

@endsection