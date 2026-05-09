<?php

use Illuminate\Support\Facades\Route;
use App\Models\Activity;
use App\Models\Installation;

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\InstallationController;



// Rutas publicas

Route::get('/', function () {
    return view('home');
});

Route::view('/contacto', 'contacto')->name('contacto');

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

    Route::get('/admin/panel', function () {
        return view('admin/panel-admin');
    })->name('admin.panel');

    Route::resource('/admin/activities', ActivityController::class)
        ->names('admin.activities');

    Route::resource('/admin/installations', InstallationController::class)
        ->names('admin.installations');

});