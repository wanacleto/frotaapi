<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ServicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$cidadeId = 'bc9a7c1f-ab50-4717-b8dd-21da9bca833d'; // ID fixo da cidade anaurilandia
        //$cidadeId = '431c3c69-114e-4a5e-b76e-4410594af1ca'; // ID fixo da cidade sta rita        
        $cidadeId = 'e029f1ba-676c-4484-89d0-38094f68a7b9'; // ID fixo da cidade demostracao
        $cor = '#ffab11';

        $servicos = [
            ['nome' => 'Iptu', 'icone' => 'cogs', 'ordem' => '1', 'tipo' => 'link', 'conteudo' => 'https://agilibluems.ddns.com.br/portal/anaurilandia/#/guiasIptu'],
            ['nome' => 'Portal do Cidadão', 'icone' => 'cogs', 'ordem' => '1', 'tipo' => 'link', 'conteudo' => 'https://agilibluems.ddns.com.br/portal/anaurilandia#/'],
            ['nome' => 'Saúde', 'icone' => 'hospital', 'ordem' => '1', 'tipo' => 'form', 'conteudo' => ''],
            ['nome' => 'Ruas e Estradas', 'icone' => 'road', 'ordem' => '2', 'tipo' => 'form', 'conteudo' => ''],
            ['nome' => 'Espaço Público', 'icone' => 'tree', 'ordem' => '3', 'tipo' => 'form', 'conteudo' => ''],
            ['nome' => 'Iluminação Pública', 'icone' => 'lightbulb', 'ordem' => '4', 'tipo' => 'form', 'conteudo' => ''],
            ['nome' => 'Terrenos', 'icone' => 'map', 'ordem' => '5', 'tipo' => 'form', 'conteudo' => ''],
            ['nome' => 'Trânsito e Sinalização', 'icone' => 'traffic-light', 'ordem' => '6', 'tipo' => 'personalizado', 'conteudo' => ''],
            //['nome' => 'Maus-tratos a Animais', 'icone' => 'paw', 'ordem' => '7', 'tipo' => 'mensagem', 'conteudo' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'],
            ['nome' => 'Segurança Pública', 'icone' => 'shield-alt', 'ordem' => '8', 'tipo' => 'telefone', 'conteudo' => '190'],
            ['nome' => 'Denúncia Ambiental', 'icone' => 'cogs', 'ordem' => '9', 'tipo' => 'link', 'conteudo' => 'https://www.google.com/'],
            ['nome' => 'Ouvidoria', 'icone' => 'cogs', 'ordem' => '10', 'tipo' => 'whatsapp', 'conteudo' => '67992492997'],           
            ['nome' => 'Outros Setores', 'icone' => 'cogs', 'ordem' => '11', 'tipo' => 'form', 'conteudo' => ''], 
            // ['nome' => 'Outros II', 'icone' => 'cogs', 'ordem' => '12', 'tipo' => 'form', 'conteudo' => ''],            
        ];

        foreach ($servicos as $servico) {
            DB::table('servicos')->insert([
                'id' => (string) Str::uuid(),
                'cidade_id' => $cidadeId,
                'nome' => $servico['nome'],
                'descricao' => null,
                'cor' => $cor,
                'ordem' => $servico['ordem'],
                'icone' => $servico['icone'],
                'tipo' => $servico['tipo'],
                'conteudo' => $servico['conteudo'],
                'ativo' => true,
                'key' => (string) Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
