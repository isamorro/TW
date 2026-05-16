<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SessionActivity;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        // Coger usuarios normales (no admins). Si no hay, coger los primeros.
        $users = User::where('role', 'user')->take(3)->get();
        if ($users->isEmpty()) {
            $users = User::take(3)->get();
        }

        if ($users->isEmpty()) {
            $this->command->warn('No hay usuarios en la BD.');
            return;
        }

        $sessions = SessionActivity::inRandomOrder()->limit(15)->get();

        if ($sessions->isEmpty()) {
            $this->command->warn('No hay sesiones. Ejecuta SessionActivitySeeder primero.');
            return;
        }

        $total = 0;
        foreach ($users as $user) {
            // 3 reservas por usuario en sesiones diferentes
            $sessionsForUser = $sessions->random(min(3, $sessions->count()));

            foreach ($sessionsForUser as $session) {
                // Evitar duplicados (mismo usuario + misma sesión)
                $exists = Reservation::where('user_id', $user->id)
                    ->where('session_id', $session->id)
                    ->exists();

                if (!$exists) {
                    Reservation::create([
                        'user_id'    => $user->id,
                        'session_id' => $session->id,
                        'status'     => 'active',
                    ]);
                    $total++;
                }
            }
        }

        $this->command->info("Reservas de prueba creadas: {$total}");
    }
}