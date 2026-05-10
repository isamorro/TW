<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.panel')
            ->with('success', 'La reserva ha sido cancelada correctamente.');
    }
}