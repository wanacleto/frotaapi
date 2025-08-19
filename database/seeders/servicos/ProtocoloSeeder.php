<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin\Chatpovo\Cidade;
use App\Models\Admin\Chatpovo\Usuario;
use App\Models\Admin\Chatpovo\Protocolo;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProtocoloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica se há cidades e usuários
        $cidade = Cidade::inRandomOrder()->first();
        $usuario = User::inRandomOrder()->first();

        if (!$cidade || !$usuario) {
            $this->command->error('É necessário ter pelo menos 1 cidade e 1 usuário cadastrados.');
            return;
        }

        Protocolo::create([
            'id'                     => Str::uuid(),
            'cidade_id'              => $cidade->id,
            'user_id'                => $usuario->id,
            'tipo_protocolo'         => 'Solicitação de Iluminação Pública',
            'cep'                    => '79005-000',
            'endereco'               => 'Rua das Acácias',
            'numero'                 => '123',
            'bairro'                 => 'Jardim América',
            'cidade'                 => 'Campo Grande',
            'uf'                     => 'MS',
            'descricao'              => 'Lâmpada queimada em frente à residência.',
            'telefone'               => '(67) 99876-1234',
            'status'                 => 'pendente',
            'atualizacoes_nao_lidas' => 0,
            'precisa_resposta'       => false,
            'ativo'                 => true,
            'key'                    => Str::uuid(),
        ]);

        Protocolo::create([
            'id'                     => Str::uuid(),
            'cidade_id'              => $cidade->id,
            'user_id'                => $usuario->id,
            'tipo_protocolo'         => 'Denúncia Ambiental',
            'cep'                    => '79010-222',
            'endereco'               => 'Av. Brasil',
            'numero'                 => '456',
            'bairro'                 => 'Centro',
            'cidade'                 => 'Campo Grande',
            'uf'                     => 'MS',
            'descricao'              => 'Descarte irregular de entulho em terreno baldio.',
            'telefone'               => '(67) 91234-5678',
            'status'                 => 'progresso',
            'atualizacoes_nao_lidas' => 2,
            'precisa_resposta'       => true,
            'ativo'                 => true,
            'key'                    => Str::uuid(),
        ]);
        

    }
}
