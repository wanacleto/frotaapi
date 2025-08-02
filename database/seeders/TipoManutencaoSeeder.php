<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TipoManutencaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_manutencaos')->insert([
            ['nome' => 'Troca de óleo', 'status' => 'ativo', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Revisão dos freios', 'status' => 'ativo', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Alinhamento', 'status' => 'inativo', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
