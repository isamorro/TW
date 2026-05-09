<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('installations')->insert([

            [
                'name' => 'Pistas de Pádel',
                'description' => 'Instalación equipada con pistas de pádel para partidos y entrenamientos.',
                'image_path' => 'images/padel.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Sala de Spinning',
                'description' => 'Sala equipada con bicicletas indoor para clases colectivas de spinning.',
                'image_path' => 'images/spinning.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Sala Cuerpo y Mente',
                'description' => 'Espacio diseñado para actividades como yoga y pilates.',
                'image_path' => 'images/yoga.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Zona Funcional',
                'description' => 'Área destinada a entrenamientos funcionales, HIIT, TRX y calistenia.',
                'image_path' => 'images/cross-training.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Piscina Cubierta',
                'description' => 'Piscina climatizada para natación y actividades acuáticas.',
                'image_path' => 'images/natacion.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Sala de Combate',
                'description' => 'Espacio preparado para boxeo y kickboxing.',
                'image_path' => 'images/boxeo.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Sala de Actividades Dirigidas',
                'description' => 'Sala polivalente para zumba, body pump y clases grupales.',
                'image_path' => 'images/zumba.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Zona de Entrenamiento Personal',
                'description' => 'Espacio reservado para sesiones individualizadas con entrenador.',
                'image_path' => 'images/entrenamiento-personal.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Rocódromo Indoor',
                'description' => 'Instalación de escalada interior con diferentes niveles de dificultad.',
                'image_path' => 'images/escalada.png',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}