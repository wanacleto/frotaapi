<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class SistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sistemas')->insert([
            [
                'id' => Str::uuid(),
                'serial' => 1,
                'api' => 'https://enercon.by.dev.br/api/',
                'nome' => 'Enercon',
                'logo' => 'logos/enercon.png',
                'descricao' => 'Sistema de gestão Enercon.',
                'cor' => '#ffab11',
                'icone' => 'cogs',
                'ativo' => true,
                'key' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}
