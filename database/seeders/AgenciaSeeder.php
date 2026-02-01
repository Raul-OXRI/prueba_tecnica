<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agencia')->insert([
            'name' => 'Agencia Central', 
            'serie_agencia' => 'AC-001', 
            'codigo_agencia' => '0001',
            'address' => '6a Avenida 12-61 Zona 1, Ciudad de Guatemala', 
            'phone' => '2424-2424', 
            'status' => 1,
            'img' => '',
            'longitud' => -90.5132730, 
            'latitud' => 14.6349150,
            'cod_municipio' => 7
        ]);
    }
}
