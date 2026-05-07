<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// |--------------------------------------------------------------------------
// | Rutas publicas (Consulta de horarios, catálogo de actividades e instalaciones disponibles.)
// |--------------------------------------------------------------------------
Route::get('/', function () {
    return view('home');
});

Route::view('/contacto', 'contacto')->name('contacto');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/catalogo', function () {
    return view('catalogo');
})->name('catalogo');

Route::get('/actividad/{id}', function ($id) {
    return view('actividad-detalle', compact('id'));
})->name('actividad.detalle');

Route::get('/instalaciones', function () {
    return view('instalaciones');
})->name('instalaciones');

// |--------------------------------------------------------------------------
// | Rutas Autenticación 
// | (Reserva de pistas o sesiones, bloqueando la plaza para otros
// |  usuarios, y consulta del historial de reservas.)
// |--------------------------------------------------------------------------

Route::get ('/login', function () {
    return view('login.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.attempt');
Route::post('/logout', function(){

    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');

Route::get ('/register', function () {
    return view('login.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::view('/profile', 'login.profile')
    ->middleware('auth')
    ->name('profile');

Route::get('/usuario/reservas', function () {
    return view('reservas');
})->middleware('auth')->name('reservas');


// |--------------------------------------------------------------------------
// | Rutas Administración
// |--------------------------------------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/panel', function () {
        return view('panel-admin');
    })->name('admin.panel');
});