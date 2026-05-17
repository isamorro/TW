@extends('login.layout')

@section('title', 'Perfil')

@section('header-action')
@endsection

@section('content')

<div class="mb-6 pb-6 border-b border-gray-100 text-center">
    <h1 class="text-3xl font-extrabold tracking-tight text-charcoal">Hola, {{ auth()->user()->name }}</h1>
    <p class="mt-2 text-sm text-charcoal-light font-medium">{{ auth()->user()->email }}</p>
</div>

@if (session('status'))
    <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
        {{ session('status') }}
    </div>
@endif

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

    <details class="rounded-xl border border-gray-200 bg-gray-50 p-5 shadow-sm" {{ $errors->any() ? 'open' : '' }}>
        <summary class="cursor-pointer list-none text-sm font-bold text-brand">
            <i class="fa-solid fa-gear mr-2"></i> Ajustes de usuario
        </summary>

        <h2 class="mt-4 text-base font-bold text-charcoal">Actualizar perfil</h2>
        <p class="mt-1 text-xs text-charcoal-light">Cambio de nombre y contraseña.</p>

        <form action="{{ route('profile.update') }}" method="POST" class="mt-4 space-y-4">
            @csrf

            <div>
                <label for="name" class="mb-1 block text-sm font-semibold text-charcoal">Nombre</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name', auth()->user()->name) }}"
                    required
                    minlength="2"
                    maxlength="40"
                    autocomplete="name"
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-charcoal outline-none transition focus:border-brand"
                >
                @error('name')
                    <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="current_password" class="mb-1 block text-sm font-semibold text-charcoal">Contraseña actual</label>
                <input
                    id="current_password"
                    name="current_password"
                    type="password"
                    autocomplete="current-password"
                    maxlength="40"
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-charcoal outline-none transition focus:border-brand"
                >
                @error('current_password')
                    <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1 block text-sm font-semibold text-charcoal">Nueva contraseña</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    minlength="8"
                    maxlength="40"
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-charcoal outline-none transition focus:border-brand"
                >
                @error('password')
                    <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="mb-1 block text-sm font-semibold text-charcoal">Confirmar contraseña</label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    minlength="8"
                    maxlength="40"
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-charcoal outline-none transition focus:border-brand"
                >
            </div>

            <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl bg-brand px-4 py-3 text-sm font-bold text-white shadow-md transition-all hover:bg-brand-hover hover:scale-[1.01]">
                Guardar cambios
            </button>
        </form>
    </details>

    <form action="{{ route('logout') }}" method="POST" class="pt-4">
        @csrf
        <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl border-2 border-gray-200 bg-white px-4 py-3 text-sm font-bold text-charcoal shadow-sm transition-all hover:border-gray-300 hover:bg-gray-50 hover:text-red-500">
            <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Cerrar sesión
        </button>
    </form>
</div>

@endsection