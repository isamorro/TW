<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\SessionActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Listar las reservas del usuario autenticado.
     * RF6: consulta del historial de reservas.
     */
    public function index()
    {
        $user = Auth::user();

        $reservations = $user->reservations()
            ->with(['session.activity', 'session.installation'])
            ->get()
            ->sortBy(fn($r) => $r->session->date->format('Y-m-d') . ' ' . $r->session->start_time);

        return view('reservas', compact('reservations'));
    }

    /**
     * Mostrar el formulario de confirmación de reserva para una sesión concreta.
     */
    public function create(SessionActivity $session)
    {
        $session->load('activity', 'installation');

        $plazasLibres = $session->activity->capacity - $this->plazasOcupadas($session);

        return view('reserva-crear', compact('session', 'plazasLibres'));
    }

    /**
     * Guardar la reserva aplicando todas las validaciones.
     * RF5, RF9 y RF10.
     */
    public function store(Request $request)
    {
        $request->validate([
            'session_id' => 'required|integer|exists:sessions_activities,id',
        ]);

        $session = SessionActivity::with('activity')->findOrFail($request->session_id);
        $userId = Auth::id();

        // Sesión no debe haber pasado
        if ($this->sesionEnPasado($session)) {
            return back()->withErrors([
                'session' => 'No puedes reservar una sesión que ya ha pasado.',
            ]);
        }

        // RF9: control de capacidad
        if ($this->plazasOcupadas($session) >= $session->activity->capacity) {
            return back()->withErrors([
                'session' => 'La sesión está completa. No quedan plazas disponibles.',
            ]);
        }

        // RF10: control de solapamientos horarios
        if ($this->usuarioTieneSolapamiento($userId, $session)) {
            return back()->withErrors([
                'session' => 'Ya tienes otra reserva que se solapa con este horario.',
            ]);
        }

        // Evitar duplicado exacto
        if ($this->usuarioYaReservoSesion($userId, $session->id)) {
            return back()->withErrors([
                'session' => 'Ya tienes una reserva activa en esta sesión.',
            ]);
        }

        Reservation::create([
            'user_id'    => $userId,
            'session_id' => $session->id,
            'status'     => 'active',
        ]);

        return redirect()->route('reservas')->with('success', 'Reserva creada correctamente.');
    }

    /**
     * Cancelar una reserva (propia o, si es admin, cualquiera).
     * RF7: cancelar reservas.
     */
    public function destroy(Reservation $reservation)
    {
        $user = Auth::user();

        if ($reservation->user_id !== $user->id && $user->role !== 'admin') {
            abort(403, 'No tienes permiso para cancelar esta reserva.');
        }

        $reservation->update(['status' => 'cancelled']);

        if ($user->role === 'admin') {
            return back()->with('success', 'Reserva cancelada.');
        }

        return redirect()->route('reservas')->with('success', 'Reserva cancelada.');
    }

    // ===== HELPERS PRIVADOS =====

    private function plazasOcupadas(SessionActivity $session): int
    {
        return $session->reservations()
            ->where('status', 'active')
            ->count();
    }

    private function usuarioYaReservoSesion(int $userId, int $sessionId): bool
    {
        return Reservation::where('user_id', $userId)
            ->where('session_id', $sessionId)
            ->where('status', 'active')
            ->exists();
    }

    private function sesionEnPasado(SessionActivity $session): bool
    {
        $fechaHora = Carbon::parse(
            $session->date->format('Y-m-d') . ' ' . $session->start_time
        );
        return $fechaHora->isPast();
    }

    /**
     * RF10: solapamiento de intervalos.
     * Dos intervalos [a1, a2] y [b1, b2] se solapan si a1 < b2 AND a2 > b1.
     */
    private function usuarioTieneSolapamiento(int $userId, SessionActivity $session): bool
    {
        $fecha = $session->date->format('Y-m-d');

        return Reservation::where('user_id', $userId)
            ->where('status', 'active')
            ->whereHas('session', function ($query) use ($fecha, $session) {
                $query->whereDate('date', $fecha)
                      ->where('start_time', '<', $session->end_time)
                      ->where('end_time', '>', $session->start_time);
            })
            ->exists();
    }
}