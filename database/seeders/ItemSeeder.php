<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            ['nome' => 'Filtro de óleo', 'descricao' => 'Substituir filtro de óleo do motor', 'ordem' => 1, 'status' => 'ativo', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Verificação de freios', 'descricao' => 'Inspecionar pastilhas e discos', 'ordem' => 2, 'status' => 'ativo', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Checagem elétrica', 'descricao' => 'Verificar bateria e fusíveis', 'ordem' => 3, 'status' => 'inativo', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
