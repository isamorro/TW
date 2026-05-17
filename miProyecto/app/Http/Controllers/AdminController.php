<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Installation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'No tienes permisos de administrador.');
        }

        $occupancy = Activity::query()
            ->leftJoin('sessions_activities', 'activities.id', '=', 'sessions_activities.activity_id')
            ->leftJoin('reservations', function ($join) {
                $join->on('sessions_activities.id', '=', 'reservations.session_id')
                    ->where('reservations.status', '=', 'active');
            })
            ->select(
                'activities.id',
                'activities.name',
                'activities.capacity'
            )
            ->selectRaw('COUNT(reservations.id) as current_occupancy')
            ->groupBy('activities.id', 'activities.name', 'activities.capacity')
            ->get();

        $occupancy = collect();
        $activities = Activity::all();
        $reservations = Reservation::all(); 

        return view('admin.panel-admin', compact('activities', 'reservations', 'occupancy'));
    }
}