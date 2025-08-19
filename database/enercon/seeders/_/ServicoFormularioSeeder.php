<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ServicoFormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Pegue o ID do serviço já criado (ajuste se necessário)
        $servico = DB::table('servicos')->where('tipo', 'form')->first();

        if (!$servico) {
            $this->command->error('Serviço com tipo=form não encontrado.');
            return;
        }

        // Cria o formulário vinculado ao serviço
        DB::table('servico_formularios')->insert([
            'id' => $formularioId = Str::uuid(),
            'servico_id' => $servico->id,
            'nome' => 'Formulário de Saúde',
            'descricao' => 'Protocolo para solicitações de saúde',
            'versao' => '1.0',
            'ativo' => true,
            'permite_fotos' => true,
            'max_fotos' => 5,
            'fotos_obrigatorias' => false,
            'permite_localizacao' => true,
            'localizacao_obrigatoria' => false,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Salva ID do formulário para uso posterior
        file_put_contents(database_path('seed_formulario_id.txt'), $formularioId);
    }
}
