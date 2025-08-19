<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class FormularioCampoPersonalizadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        // ID do serviço (você deve ajustar este UUID para um serviço existente)
        $servicoId = '522f4e9b-61d1-44ff-b2df-b2b9c9e2bbb6';
        
        // Criar o formulário
        $formularioId = Str::uuid();

        // Criar os campos do formulário
        $campos = [
            [
                'id' => Str::uuid(),
                'servico_id' => $servicoId,
                'nome' => 'descricao',
                'label' => 'Descrição do Problema',
                'tipo' => 'textarea',
                'obrigatorio' => true,
                'ordem' => 6,
                'placeholder' => 'Descreva o problema detalhadamente...',
                'keyboard_type' => 'default',
                'multiline' => true,
                'number_of_lines' => 4,
                'validacao' => json_encode([
                    'min_length' => 20,
                    'max_length' => 1000
                ]),
                'opcoes' => null,
                'condicional' => null,
                'estilo' => json_encode([
                    'largura' => 'full',
                    'altura' => 120
                ]),
                'ativo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Inserir todos os campos
        DB::table('formulario_personalizados')->insert($campos);

        // Atualizar a tabela servicos para indicar que tem formulário customizado
        DB::table('servicos')
            ->where('id', $servicoId)
            ->update([
                // 'formulario_customizado' => true,
                // 'formulario_ativo' => true,
                // 'permite_protocolo_sem_formulario' => true,
                'updated_at' => $now
            ]);

        $this->command->info('Seeder de formulários dinâmicos executado com sucesso!');
        $this->command->info('Formulário ID: ' . $formularioId);
        $this->command->info('Serviço ID: ' . $servicoId);

    }
}
