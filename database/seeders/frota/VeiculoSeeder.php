<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('veiculos')->insert([
            ['nome' => 'Fiorino', 'marca' => 'Fiat', 'placa' => 'ABC-1234', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Spin', 'marca' => 'Chevrolet', 'placa' => 'XYZ-5678', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Hilux', 'marca' => 'Toyota', 'placa' => 'QWE-9876', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
