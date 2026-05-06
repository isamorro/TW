<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('installations')->insert([
            ['name' => 'Pista de Pádel 1', 'description' => 'Pista de cristal exterior', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pista de Pádel 2', 'description' => 'Pista de muro interior', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sala de Ciclo Indoor', 'description' => 'Sala con 20 bicicletas', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}