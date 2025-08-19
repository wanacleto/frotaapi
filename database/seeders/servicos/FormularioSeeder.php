<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$formularioId = trim(@file_get_contents(database_path('seed_formulario_id.txt')));
        $servicoId = '522f4e9b-61d1-44ff-b2df-b2b9c9e2bbb6';

        if (!$servicoId) {
            $this->command->error('formulario_id não encontrado. Execute o ServicoFormularioSeeder primeiro.');
            return;
        }

        $now = Carbon::now();

        $campos = [
            [
                'nome' => 'cep',
                'label' => 'CEP',
                'tipo' => 'text',
                'ordem' => 1,
                'placeholder' => 'CEP (opcional)',
                'keyboard_type' => 'numeric',
                'validacao' => [
                    'pattern' => '^[0-9]{5}-?[0-9]{3}$',
                    'max_length' => 9
                ],
                'estilo' => ['largura' => 'full']
            ],
            [
                'nome' => 'endereco',
                'label' => 'Endereço',
                'tipo' => 'text',
                'ordem' => 2,
                'placeholder' => 'Digite o endereço',
                'keyboard_type' => 'default',
                'obrigatorio' => true,
                'validacao' => ['min_length' => 5, 'max_length' => 200],
                'estilo' => ['largura' => 'full']
            ],
            [
                'nome' => 'numero',
                'label' => 'Número',
                'tipo' => 'text',
                'ordem' => 3,
                'placeholder' => 'Digite o número',
                'keyboard_type' => 'numeric',
                'obrigatorio' => true,
                'validacao' => ['max_length' => 10],
                'estilo' => ['largura' => 'half']
            ],
            [
                'nome' => 'telefone',
                'label' => 'Telefone para Contato',
                'tipo' => 'text',
                'ordem' => 4,
                'placeholder' => 'Digite seu telefone para contato',
                'keyboard_type' => 'phone-pad',
                'obrigatorio' => true,
                'validacao' => [
                    'pattern' => '^\\([0-9]{2}\\)\\s[0-9]{4,5}-[0-9]{4}$',
                    'min_length' => 10,
                    'max_length' => 15
                ],
                'estilo' => ['largura' => 'full']
            ],
            [
                'nome' => 'descricao',
                'label' => 'Descrição do Problema',
                'tipo' => 'textarea',
                'ordem' => 5,
                'placeholder' => 'Descreva o problema detalhadamente...',
                'multiline' => true,
                'number_of_lines' => 4,
                'keyboard_type' => 'default',
                'obrigatorio' => true,
                'validacao' => ['min_length' => 20, 'max_length' => 1000],
                'estilo' => ['largura' => 'full', 'altura' => 120]
            ],
            [
                'nome' => 'urgencia',
                'label' => 'Nível de Urgência',
                'tipo' => 'select',
                'ordem' => 6,
                'placeholder' => 'Selecione o nível de urgência',
                'obrigatorio' => true,
                'opcoes' => [
                    ['valor' => 'baixa', 'label' => 'Baixa', 'ordem' => 1, 'cor' => '#4CAF50'],
                    ['valor' => 'media', 'label' => 'Média', 'ordem' => 2, 'cor' => '#FF9800'],
                    ['valor' => 'alta',  'label' => 'Alta',  'ordem' => 3, 'cor' => '#F44336'],
                ],
                'estilo' => ['largura' => 'full']
            ]
        ];

        foreach ($campos as $campo) {
            DB::table('formularios')->insert([
                'id' => Str::uuid(),
                'servico_id' => $servicoId,
                'nome' => $campo['nome'],
                'label' => $campo['label'],
                'tipo' => $campo['tipo'],
                'obrigatorio' => $campo['obrigatorio'] ?? false,
                'ordem' => $campo['ordem'],
                'placeholder' => $campo['placeholder'] ?? null,
                'keyboard_type' => $campo['keyboard_type'] ?? 'default',
                'multiline' => $campo['multiline'] ?? false,
                'number_of_lines' => $campo['number_of_lines'] ?? 1,
                'validacao' => isset($campo['validacao']) ? json_encode($campo['validacao']) : null,
                'opcoes' => isset($campo['opcoes']) ? json_encode($campo['opcoes']) : null,
                'condicional' => null,
                'estilo' => isset($campo['estilo']) ? json_encode($campo['estilo']) : null,
                'ativo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
