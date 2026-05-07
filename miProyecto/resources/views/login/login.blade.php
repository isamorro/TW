@extends('login.layout')

@section('title', 'Iniciar sesión')

@section('header-action')
<a href="{{ route('home') }}" class="inline-flex h-9 items-center gap-2 rounded-md border border-slate-200 bg-white px-3 text-sm font-medium text-slate-600 shadow-sm transition hover:border-emerald-300 hover:text-emerald-700" aria-label="Volver al inicio">
    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M15 18l-6-6 6-6"></path>
    </svg>
    <span class="hidden sm:inline">Volver</span>
</a>
@endsection

@section('content')

<div class="mb-8">
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Iniciar sesión</h1>
    <p class="mt-1 text-sm text-slate-500">Accede para consultar tus reservas y tu perfil.</p>
</div>

@if ($errors->any())
    @include('login.form-errors')
@endif

<form method="POST" action="{{ route('login.attempt') }}" class="space-y-6">
    @csrf

    <div>
        <label for="email" class="mb-1.5 block text-sm font-medium text-slate-700">Correo electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
            class="block w-full rounded-md border-0 py-2 px-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6"
            placeholder="correo@ejemplo.com">
    </div>

    <div>
        <label for="password" class="mb-1.5 block text-sm font-medium text-slate-700">Contraseña</label>
        <input type="password" id="password" name="password" required autocomplete="current-password"
            class="block w-full rounded-md border-0 py-2 px-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6"
            placeholder="Tu contraseña">
    </div>

    <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
        Entrar
    </button>
</form>

<div class="mt-8 text-center text-sm text-slate-600">
    <p>
        ¿No tienes cuenta?
        <a href="{{ route('register') }}" class="font-semibold text-emerald-600 transition hover:text-emerald-500 hover:underline">Regístrate aquí</a>
    </p>
</div>
@endsection