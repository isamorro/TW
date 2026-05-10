<?php

use Illuminate\Support\Facades\Route;
use App\Models\Activity;
use App\Models\Installation;
use App\Models\Reservation;

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\InstallationController;




// Rutas publicas

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
    $activities = Activity::orderBy('name')->get();
    return view('actividad-detalle', compact('activity'), compact('activities'));
})->name('activities.show');

Route::get('/instalaciones', function () {
    $installations = Installation::orderBy('name')->get();
    return view('instalaciones', compact('installations'));
})->name('instalaciones');

// Rutas Autenticación 

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

// Rutas Administración

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/panel', [AdminController::class, 'index'])->name('admin.panel');

    Route::get('/admin/activities', [ActivityController::class, 'adminList'])->name('admin.activities.index');

    Route::resource('/admin/activities', ActivityController::class)
        ->except(['index'])
        ->names('admin.activities');

    Route::resource('/admin/installations', InstallationController::class)
        ->names('admin.installations');

    Route::delete('/admin/reservations/{reservation}', [ReservationController::class, 'destroy'])
        ->name('admin.reservations.destroy');

});