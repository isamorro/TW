@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-12 px-4">
    <h1 class="text-4xl font-bold text-charcoal mb-6">Contacto</h1>
    
    <form action="{{ route('contacto.send') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-lg space-y-4">
        @csrf
        <div>
            <label class="block font-bold mb-1">
                Nombre
            </label>
            <input type="text" name="name" required class="w-full border rounded-xl p-3">
        </div>
        <div>
            <label class="block font-bold mb-1">
                Correo Electrónico
            </label>
            <input type="email" name="email" required class="w-full border rounded-xl p-3">
        </div>
        <div>
            <label class="block font-bold mb-1">
                Mensaje
            </label>
            <textarea name="message" required rows="5" class="w-full border rounded-xl p-3"></textarea>
        </div>
        <button type="submit" class="w-full bg-brand text-white font-bold py-3 rounded-xl hover:bg-brand-hover transition-colors">
            Enviar Mensaje
        </button>
    </form>
</div>
@endsection