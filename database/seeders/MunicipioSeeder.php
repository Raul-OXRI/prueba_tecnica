<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = [
            ['name' => 'Cobán', 'cod_departamento' => 1],
            ['name' => 'Santa Cruz Verapaz', 'cod_departamento' => 1],
            ['name' => 'San Cristóbal Verapaz', 'cod_departamento' => 1],
            ['name' => 'Tactic', 'cod_departamento' => 1],
            ['name' => 'Tamahú', 'cod_departamento' => 1],
            ['name' => 'Tucurú', 'cod_departamento' => 1],
            ['name' => 'Panzós', 'cod_departamento' => 1],
            ['name' => 'Senahú', 'cod_departamento' => 1],
            ['name' => 'San Pedro Carchá', 'cod_departamento' => 1],
            ['name' => 'San Juan Chamelco', 'cod_departamento' => 1],
            ['name' => 'Lanquín', 'cod_departamento' => 1],
            ['name' => 'Santa María Cahabón', 'cod_departamento' => 1],
            ['name' => 'Chisec', 'cod_departamento' => 1],
            ['name' => 'Chahal', 'cod_departamento' => 1],
            ['name' => 'Fray Bartolomé de las Casas', 'cod_departamento' => 1],
            ['name' => 'Santa Catalina La Tinta', 'cod_departamento' => 1],
            ['name' => 'Raxruha', 'cod_departamento' => 1],
        ];

        DB::table('municipio')->insert($municipios);
    }
}
