<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Installation;
// use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'No tienes permisos de administrador.');
        }
        // Descomentar cuando reservations esté implementado

        // $occupancy = DB::table('activities')
        //     ->leftJoin('reservations', 'activities.id', '=', 'reservations.activity_id')
        //     ->select(
        //         'activities.name',
        //         'activities.capacity',
        //         DB::raw('count(reservations.id) as current_occupancy')
        //     )
        //     ->groupBy('activities.id', 'activities.name', 'activities.capacity')
        //     ->get();

        $occupancy = collect();
        $activities = Activity::all();
        // Usar est línea en vez de la siguiente cuando reservations esté implementado
        // $reservations = Reservation::all(); 
        $reservations = collect();

        return view('admin.panel-admin', compact('activities', 'reservations', 'occupancy'));
    }
}