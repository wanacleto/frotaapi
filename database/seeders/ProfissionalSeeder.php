<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfissionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profissionals')->insert([
            [
                'user_id' => 1,
                'nome' => 'Carlos Mendes',
                'cpf' => '12345678900',
                'matricula' => 'PM001',
                'celular' => '(67) 91234-5678',
                'codigo' => 'COD001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'nome' => 'Fernanda Costa',
                'cpf' => '98765432100',
                'matricula' => 'PM002',
                'celular' => '(67) 99876-5432',
                'codigo' => 'COD002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
