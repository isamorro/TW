<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Activity;
use App\Models\Installation;

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstallationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SessionActivityController;

// Rutas públicas

Route::view('/', 'home')->name('home');

Route::view('/contacto', 'contacto')->name('contacto');

Route::get('/catalogo', function () {
    $activities = Activity::orderBy('name')->get();
    return view('catalogo', compact('activities'));
})->name('catalogo');

Route::get('/catalogo/{activity}', function (Activity $activity) {
    $activity->load([
        'sessions.installation',
        'sessions.reservations',
    ]);
    $activities = Activity::orderBy('name')->get();
    return view('actividad-detalle', compact('activity', 'activities'));
})->name('activities.show');

Route::get('/instalaciones', function () {
    $installations = Installation::orderBy('name')->get();
    return view('instalaciones', compact('installations'));
})->name('instalaciones');

// Autenticación

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

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::view('/profile', 'login.profile')
    ->middleware('auth')
    ->name('profile');

// Reservas de usuario

Route::middleware('auth')->group(function () {
    Route::get('/usuario/reservas', [ReservationController::class, 'index'])
        ->name('reservas');

    Route::get('/reservar/{session}', [ReservationController::class, 'create'])
        ->name('reservas.create');

    Route::post('/reservar', [ReservationController::class, 'store'])
        ->name('reservas.store');

    Route::delete('/usuario/reservas/{reservation}', [ReservationController::class, 'destroy'])
        ->name('reservas.destroy');
});

// Administración

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'index'])
        ->name('admin.panel');

    Route::get('/admin/activities/create', [ActivityController::class, 'create'])
        ->name('admin.activities.create');

    Route::post('/admin/activities', [ActivityController::class, 'store'])
        ->name('admin.activities.store');

    Route::get('/admin/activities/{activity}/edit', [ActivityController::class, 'edit'])
        ->name('admin.activities.edit');

    Route::put('/admin/activities/{activity}', [ActivityController::class, 'update'])
        ->name('admin.activities.update');

    Route::delete('/admin/activities/{activity}', [ActivityController::class, 'destroy'])
        ->name('admin.activities.destroy');

    Route::get('/admin/installations/create', [InstallationController::class, 'create'])
        ->name('admin.installations.create');

    Route::post('/admin/installations', [InstallationController::class, 'store'])
        ->name('admin.installations.store');

    Route::get('/admin/installations/{installation}/edit', [InstallationController::class, 'edit'])
        ->name('admin.installations.edit');

    Route::put('/admin/installations/{installation}', [InstallationController::class, 'update'])
        ->name('admin.installations.update');

    Route::delete('/admin/installations/{installation}', [InstallationController::class, 'destroy'])
        ->name('admin.installations.destroy');

    Route::get('/admin/reservations', [ReservationController::class, 'adminIndex'])
        ->name('admin.reservations.index');

    Route::get('/admin/reservations/history', [ReservationController::class, 'adminHistory'])
        ->name('admin.reservations.history');

    Route::delete('/admin/reservations/{reservation}', [ReservationController::class, 'destroy'])
        ->name('admin.reservations.destroy');

    Route::get('/admin/sessions/create', [SessionActivityController::class, 'create'])
        ->name('admin.sessions.create');

    Route::post('/admin/sessions', [SessionActivityController::class, 'store'])
        ->name('admin.sessions.store');

    Route::get('/admin/sessions/{session}/edit', [SessionActivityController::class, 'edit'])
        ->name('admin.sessions.edit');

    Route::put('/admin/sessions/{session}', [SessionActivityController::class, 'update'])
        ->name('admin.sessions.update');

    Route::delete('/admin/sessions/{session}', [SessionActivityController::class, 'destroy'])
        ->name('admin.sessions.destroy');
});