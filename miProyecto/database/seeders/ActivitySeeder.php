<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('activities')->insert([

            [
                'name' => 'Alquiler de Pádel',
                'description' => 'Reserva de pista para 4 personas.',
                'capacity' => 4,
                'image_path' => 'images/padel.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Clase de Spinning',
                'description' => 'Clase de ciclismo indoor de alta intensidad.',
                'capacity' => 20,
                'image_path' => 'images/spinning.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Yoga',
                'description' => 'Sesiones de relajación, flexibilidad y respiración.',
                'capacity' => 18,
                'image_path' => 'images/yoga.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Pilates',
                'description' => 'Entrenamiento de fuerza, control corporal y postura.',
                'capacity' => 15,
                'image_path' => 'images/pilates.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Cross Training',
                'description' => 'Entrenamiento funcional de alta intensidad.',
                'capacity' => 16,
                'image_path' => 'images/cross-training.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Zumba',
                'description' => 'Clases de baile fitness con música latina.',
                'capacity' => 25,
                'image_path' => 'images/zumba.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Natación',
                'description' => 'Clases de natación para diferentes niveles.',
                'capacity' => 10,
                'image_path' => 'images/natacion.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'HIIT',
                'description' => 'Entrenamiento interválico de alta intensidad.',
                'capacity' => 14,
                'image_path' => 'images/hiit.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Boxeo',
                'description' => 'Entrenamiento de técnica, resistencia y cardio.',
                'capacity' => 12,
                'image_path' => 'images/boxeo.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Body Pump',
                'description' => 'Trabajo muscular con barras y pesas.',
                'capacity' => 20,
                'image_path' => 'images/bodypump.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'TRX',
                'description' => 'Entrenamiento en suspensión para fuerza y equilibrio.',
                'capacity' => 10,
                'image_path' => 'images/trx.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Kickboxing',
                'description' => 'Clases de combate y acondicionamiento físico.',
                'capacity' => 14,
                'image_path' => 'images/kickboxing.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'AquaGym',
                'description' => 'Ejercicios acuáticos de bajo impacto.',
                'capacity' => 18,
                'image_path' => 'images/aquagym.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Entrenamiento Personal',
                'description' => 'Sesiones individualizadas con entrenador.',
                'capacity' => 5,
                'image_path' => 'images/entrenamiento-personal.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Calistenia',
                'description' => 'Entrenamiento con peso corporal.',
                'capacity' => 12,
                'image_path' => 'images/calistenia.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Escalada Indoor',
                'description' => 'Actividad de escalada en rocódromo interior.',
                'capacity' => 8,
                'image_path' => 'images/escalada.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}