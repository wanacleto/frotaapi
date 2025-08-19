<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidades = [
            'Anaurilândia', 
            'Santa Rita do Pardo',
            'Demostração',
        ];

        foreach ($cidades as $nome) {
            $nomeBanco = Str::slug($nome, '_'); // ex: campo_grande

            DB::table('cidades')->insert([
                'id' => Str::uuid(),
                //'serial' => null, // autoincrement
                'nome' => $nome,
                'slug' => $nomeBanco,
                'estado' => 'MS',
                'nome_banco_dados' => $nomeBanco,
                'logo_prefeitura' => null,
                'brasao' => null,
                'cor_principal' => '#fbbf24',
                'telefone_prefeitura' => null,
                'email_ouvidoria' => null,
                'site' => null,
                'ativo' => true,
                'key' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}
