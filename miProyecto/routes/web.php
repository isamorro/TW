<?php

use Illuminate\Support\Facades\Route;
use App\Models\Activity;
use App\Models\Installation;
use App\Models\Reservation;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstallationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SessionActivityController;

// =============================
// Rutas públicas
// =============================
Route::get('/', function () {
    return view('home');
});

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::post('/contacto', [ContactController::class, 'send'])->name('contacto.send');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/catalogo', function () {
    $activities = Activity::orderBy('name')->get();
    return view('catalogo', compact('activities'));
})->name('catalogo');

Route::get('/catalogo/{activity}', function (Activity $activity) {
    $activity->load([
        'sessions.installation',
        'sessions.reservations'
    ]);
    $activities = Activity::orderBy('name')->get();
    return view('actividad-detalle', compact('activity', 'activities'));
})->name('activities.show');

Route::get('/instalaciones', function () {
    $installations = Installation::orderBy('name')->get();
    return view('instalaciones', compact('installations'));
})->name('instalaciones');

// =============================
// Rutas de autenticación
// =============================

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.attempt');

Route::post('/logout', function () {
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/register', function () {
    return view('login.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::view('/profile', 'login.profile')
    ->middleware('auth')
    ->name('profile');

// =============================
// Reservas del usuario (autenticado)
// =============================

Route::middleware('auth')->group(function () {
    Route::get('/usuario/reservas', [ReservationController::class, 'index'])->name('reservas');
    Route::get('/reservar/{session}', [ReservationController::class, 'create'])->name('reservas.create');
    Route::post('/reservar', [ReservationController::class, 'store'])->name('reservas.store');
    Route::delete('/usuario/reservas/{reservation}', [ReservationController::class, 'destroy'])->name('reservas.destroy');
});

// =============================
// Rutas de administración
// =============================

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'index'])->name('admin.panel');
    Route::get('/admin/activities', [ActivityController::class, 'adminList'])->name('admin.activities.index');

    Route::resource('/admin/activities', ActivityController::class)
        ->except(['index'])
        ->names('admin.activities');

    Route::resource('/admin/installations', InstallationController::class)
        ->names('admin.installations');

    Route::get('/admin/reservations', [ReservationController::class, 'adminIndex'])
    ->name('admin.reservations.index');

    Route::get('/admin/reservations/history', [ReservationController::class, 'adminHistory'])
        ->name('admin.reservations.history');

    Route::delete('/admin/reservations/{reservation}', [ReservationController::class, 'destroy'])
        ->name('admin.reservations.destroy');

    Route::resource('/admin/sessions', SessionActivityController::class)
        ->names('admin.sessions');

    Route::resource('/admin/sessions', SessionActivityController::class)
    ->names('admin.sessions');
});