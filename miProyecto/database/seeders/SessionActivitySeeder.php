<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Installation;
use App\Models\SessionActivity;
use Carbon\Carbon;

class SessionActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = Activity::all();
        $installations = Installation::all();

        if ($activities->isEmpty() || $installations->isEmpty()) {
            $this->command->warn('Faltan actividades o instalaciones. Ejecuta antes los otros seeders.');
            return;
        }

        $horarios = [
            ['10:00:00', '11:00:00'],
            ['17:00:00', '18:00:00'],
            ['19:00:00', '20:30:00'],
        ];

        // Sesiones para los próximos 14 días
        for ($i = 1; $i <= 14; $i++) {
            $date = Carbon::today()->addDays($i)->format('Y-m-d');

            foreach ($activities as $activity) {
                foreach ($horarios as $horario) {
                    SessionActivity::create([
                        'activity_id'     => $activity->id,
                        'installation_id' => $installations->random()->id,
                        'date'            => $date,
                        'start_time'      => $horario[0],
                        'end_time'        => $horario[1],
                    ]);
                }
            }
        }

        $this->command->info('Sesiones creadas correctamente.');
    }
}