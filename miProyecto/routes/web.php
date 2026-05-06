<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/actividad/{id}', function ($id) {
    return view('actividad-detalle', compact('id'));
});

Route::get('/instalaciones', function () {
    return view('instalaciones');
});

Route::get('/contacto', function () {
    return view('contacto');
});

