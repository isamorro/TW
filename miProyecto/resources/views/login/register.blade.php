@extends('login.layout')

@section('title', 'Registro')

@section('header-action')
<!-- Removed duplicative header link -->
@endsection

@section('content')

<div class="mb-8 text-center">
    <h1 class="text-3xl font-extrabold tracking-tight text-charcoal">Crear cuenta</h1>
    <p class="mt-2 text-sm text-charcoal-light font-medium">Únete a nosotros y empieza a entrenar.</p>
</div>

@if ($errors->any())
    @include('login.form-errors')
@endif

<form action="{{ route('register.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="mb-1.5 block text-sm font-semibold text-charcoal">Nombre completo</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Tu nombre" required
            autocomplete="name"
            class="block w-full rounded-xl border border-gray-200 bg-gray-50 py-3 px-4 text-charcoal placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand transition-all duration-300">
    </div>
    
    <div>
        <label for="email" class="mb-1.5 block text-sm font-semibold text-charcoal">Correo electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required
            autocomplete="email"
            class="block w-full rounded-xl border border-gray-200 bg-gray-50 py-3 px-4 text-charcoal placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand transition-all duration-300">
    </div>

    <div>
        <label for="password" class="mb-1.5 block text-sm font-semibold text-charcoal">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required
            autocomplete="new-password"
            class="block w-full rounded-xl border border-gray-200 bg-gray-50 py-3 px-4 text-charcoal placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand transition-all duration-300">
    </div>

    <div>
        <label for="password_confirmation" class="mb-1.5 block text-sm font-semibold text-charcoal">Confirmar contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite la contraseña" required
            autocomplete="new-password"
            class="block w-full rounded-xl border border-gray-200 bg-gray-50 py-3 px-4 text-charcoal placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand transition-all duration-300">
    </div>

    <button type="submit" class="mt-4 flex w-full justify-center rounded-xl bg-brand px-4 py-3 text-sm font-bold text-white shadow-md transition-all hover:bg-brand-hover hover:scale-[1.02]">
        Registrarse
    </button>
</form>

<div class="mt-8 text-center text-sm font-medium text-charcoal-light">
    <p>
        ¿Ya tienes cuenta?
        <a href="{{ route('login') }}" class="font-bold text-brand transition hover:text-brand-hover hover:underline">Inicia sesión</a>
    </p>
</div>
@endsection