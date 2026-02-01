<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'last_name' => 'User',
            'username' => 'admin',
            'user_img' => '',
            'phone' => '555-0000',
            'status' => 1,
            'rol' => 'admin',
            'cod_agencia' => 1,
        ]);
    }
}
