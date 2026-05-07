@extends('login.layout')

@section('title', 'Iniciar sesión')

@section('header-action')
<!-- Removed to avoid duplication as it was moved to the layout -->
@endsection

@section('content')

<div class="mb-8 text-center">
    <h1 class="text-3xl font-extrabold tracking-tight text-charcoal">Iniciar sesión</h1>
    <p class="mt-2 text-sm text-charcoal-light font-medium">Entrena como un atleta, gestiona tus reservas.</p>
</div>

@if ($errors->any())
    @include('login.form-errors')
@endif

<form method="POST" action="{{ route('login.attempt') }}" class="space-y-6">
    @csrf

    <div>
        <label for="email" class="mb-1.5 block text-sm font-semibold text-charcoal">Correo electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
            class="block w-full rounded-xl border border-gray-200 bg-gray-50 py-3 px-4 text-charcoal placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand transition-all duration-300"
            placeholder="correo@ejemplo.com">
    </div>

    <div>
        <label for="password" class="mb-1.5 block text-sm font-semibold text-charcoal">Contraseña</label>
        <input type="password" id="password" name="password" required autocomplete="current-password"
            class="block w-full rounded-xl border border-gray-200 bg-gray-50 py-3 px-4 text-charcoal placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand transition-all duration-300"
            placeholder="Tu contraseña">
    </div>

    <button type="submit" class="flex w-full justify-center rounded-xl bg-brand px-4 py-3 text-sm font-bold text-white shadow-md transition-all hover:bg-brand-hover hover:scale-[1.02]">
        Entrar
    </button>
</form>

<div class="mt-8 text-center text-sm font-medium text-charcoal-light">
    <p>
        ¿No tienes cuenta?
        <a href="{{ route('register') }}" class="font-bold text-brand transition hover:text-brand-hover hover:underline">Regístrate aquí</a>
    </p>
</div>
@endsection