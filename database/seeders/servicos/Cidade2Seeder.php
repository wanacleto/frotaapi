<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Cidade2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidades = [
            'Água Clara', 'Alcinópolis', 'Amambai', 'Anastácio', 'Anaurilândia', 'Angélica',
            'Antônio João', 'Aparecida do Taboado', 'Aquidauana', 'Aral Moreira', 'Bandeirantes',
            'Bataguassu', 'Bataiporã', 'Bela Vista', 'Bodoquena', 'Bonito', 'Brasilândia',
            'Caarapó', 'Camapuã', 'Campo Grande', 'Caracol', 'Cassilândia', 'Chapadão do Sul',
            'Corguinho', 'Coronel Sapucaia', 'Corumbá', 'Costa Rica', 'Coxim', 'Deodápolis',
            'Dois Irmãos do Buriti', 'Douradina', 'Dourados', 'Eldorado', 'Fátima do Sul',
            'Figueirão', 'Glória de Dourados', 'Guia Lopes da Laguna', 'Iguatemi', 'Inocência',
            'Itaporã', 'Itaquiraí', 'Ivinhema', 'Japorã', 'Jaraguari', 'Jardim', 'Jateí',
            'Juti', 'Ladário', 'Laguna Carapã', 'Maracaju', 'Miranda', 'Mundo Novo', 'Naviraí',
            'Nioaque', 'Nova Alvorada do Sul', 'Nova Andradina', 'Novo Horizonte do Sul',
            'Paranaíba', 'Paranhos', 'Pedro Gomes', 'Ponta Porã', 'Porto Murtinho',
            'Ribas do Rio Pardo', 'Rio Brilhante', 'Rio Negro', 'Rio Verde de Mato Grosso',
            'Rochedo', 'Santa Rita do Pardo', 'São Gabriel do Oeste', 'Selvíria', 'Sete Quedas',
            'Sidrolândia', 'Sonora', 'Tacuru', 'Taquarussu', 'Terenos', 'Três Lagoas',
            'Vicentina',
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
                'cor_principal' => '#fbbf24',
                'telefone_prefeitura' => null,
                'email_ouvidoria' => null,
                'ativo' => true,
                'key' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}
