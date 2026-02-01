<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            ['name' => 'Alta Verapaz'],
            ['name' => 'Baja Verapaz'],
            ['name' => 'Chimaltenango'],
            ['name' => 'Chiquimula'],
            ['name' => 'El Progreso'],
            ['name' => 'Escuintla'],
            ['name' => 'Guatemala'],
            ['name' => 'Huehuetenango'],
            ['name' => 'Izabal'],
            ['name' => 'Jalapa'],
            ['name' => 'Jutiapa'],
            ['name' => 'Petén'],
            ['name' => 'Quetzaltenango'],
            ['name' => 'Quiché'],
            ['name' => 'Retalhuleu'],
            ['name' => 'Sacatepéquez'],
            ['name' => 'San Marcos'],
            ['name' => 'Santa Rosa'],
            ['name' => 'Sololá'],
            ['name' => 'Suchitepéquez'],
            ['name' => 'Totonicapán'],
            ['name' => 'Zacapa'],
        ];
        DB::table('departamento')->insert($departamentos);
    }
}
