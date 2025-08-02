<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MotoristaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('motoristas')->insert([
            [
                'profissional_id' => 1,
                'user_id' => 1,
                'nome' => 'Carlos Mendes',
                'cnh' => '12345678900',
                'validade' => '2026-12-31',
                'categoria' => json_encode(['B']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profissional_id' => 2,
                'user_id' => 2,
                'nome' => 'Fernanda Costa',
                'cnh' => '98765432100',
                'validade' => '2025-10-15',
                'categoria' => json_encode(['A', 'B']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
