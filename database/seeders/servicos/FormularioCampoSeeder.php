<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class FormularioCampoSeeder extends Seeder
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
                'nome' => 'cep',
                'label' => 'CEP',
                'tipo' => 'text',
                'obrigatorio' => false,
                'ordem' => 1,
                'placeholder' => 'CEP (opcional)',
                'keyboard_type' => 'numeric',
                'multiline' => false,
                'number_of_lines' => 1,
                'validacao' => json_encode([
                    'pattern' => '^[0-9]{5}-?[0-9]{3}$',
                    'max_length' => 9
                ]),
                'opcoes' => null,
                'condicional' => null,
                'estilo' => json_encode([
                    'largura' => 'full'
                ]),
                'ativo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'servico_id' => $servicoId,
                'nome' => 'endereco',
                'label' => 'Endereço',
                'tipo' => 'text',
                'obrigatorio' => true,
                'ordem' => 2,
                'placeholder' => 'Digite o endereço',
                'keyboard_type' => 'default',
                'multiline' => false,
                'number_of_lines' => 1,
                'validacao' => json_encode([
                    'min_length' => 5,
                    'max_length' => 200
                ]),
                'opcoes' => null,
                'condicional' => null,
                'estilo' => json_encode([
                    'largura' => 'full'
                ]),
                'ativo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'servico_id' => $servicoId,
                'nome' => 'numero',
                'label' => 'Número',
                'tipo' => 'text',
                'obrigatorio' => true,
                'ordem' => 3,
                'placeholder' => 'Digite o número',
                'keyboard_type' => 'numeric',
                'multiline' => false,
                'number_of_lines' => 1,
                'validacao' => json_encode([
                    'max_length' => 10
                ]),
                'opcoes' => null,
                'condicional' => null,
                'estilo' => json_encode([
                    'largura' => 'half'
                ]),
                'ativo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'servico_id' => $servicoId,
                'nome' => 'bairro',
                'label' => 'Bairro',
                'tipo' => 'text',
                'obrigatorio' => true,
                'ordem' => 4,
                'placeholder' => 'Digite o bairro',
                'keyboard_type' => 'default',
                'multiline' => false,
                'number_of_lines' => 1,
                'validacao' => json_encode([
                    'min_length' => 2,
                    'max_length' => 100
                ]),
                'opcoes' => null,
                'condicional' => null,
                'estilo' => json_encode([
                    'largura' => 'half'
                ]),
                'ativo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'servico_id' => $servicoId,
                'nome' => 'telefone',
                'label' => 'Telefone para Contato',
                'tipo' => 'text',
                'obrigatorio' => true,
                'ordem' => 5,
                'placeholder' => 'Digite seu telefone para contato',
                'keyboard_type' => 'phone-pad',
                'multiline' => false,
                'number_of_lines' => 1,
                'validacao' => json_encode([
                    'pattern' => '^\\([0-9]{2}\\)\\s[0-9]{4,5}-[0-9]{4}$',
                    'min_length' => 10,
                    'max_length' => 15
                ]),
                'opcoes' => null,
                'condicional' => null,
                'estilo' => json_encode([
                    'largura' => 'full'
                ]),
                'ativo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
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
            [
                'id' => Str::uuid(),
                'servico_id' => $servicoId,
                'nome' => 'urgencia',
                'label' => 'Nível de Urgência',
                'tipo' => 'select',
                'obrigatorio' => true,
                'ordem' => 7,
                'placeholder' => 'Selecione o nível de urgência',
                'keyboard_type' => 'default',
                'multiline' => false,
                'number_of_lines' => 1,
                'validacao' => null,
                'opcoes' => json_encode([
                    [
                        'valor' => 'baixa',
                        'label' => 'Baixa',
                        'ordem' => 1,
                        'cor' => '#4CAF50'
                    ],
                    [
                        'valor' => 'media',
                        'label' => 'Média',
                        'ordem' => 2,
                        'cor' => '#FF9800'
                    ],
                    [
                        'valor' => 'alta',
                        'label' => 'Alta',
                        'ordem' => 3,
                        'cor' => '#F44336'
                    ]
                ]),
                'condicional' => null,
                'estilo' => json_encode([
                    'largura' => 'full'
                ]),
                'ativo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        // Inserir todos os campos
        DB::table('formulario_campos')->insert($campos);

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
