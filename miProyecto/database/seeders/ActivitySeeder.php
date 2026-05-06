<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('activities')->insert([
            ['name' => 'Alquiler de Pádel', 'description' => 'Reserva de pista para 4 personas', 'capacity' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clase de Spinning', 'description' => 'Clase de alta intensidad', 'capacity' => 20, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}