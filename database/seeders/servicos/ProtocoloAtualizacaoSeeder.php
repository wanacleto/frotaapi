<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin\Chatpovo\Cidade;
use App\Models\Admin\Chatpovo\Usuario;
use App\Models\Admin\Chatpovo\Protocolo;
use App\Models\Admin\Chatpovo\ProtocoloAtualizacao;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProtocoloAtualizacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Busca protocolo e usuário aleatório
       $protocolo = Protocolo::inRandomOrder()->first();
       $usuario = User::inRandomOrder()->first();

       if (!$protocolo || !$usuario) {
           $this->command->error('É necessário ter pelo menos 1 protocolo e 1 usuário cadastrados.');
           return;
       }

       ProtocoloAtualizacao::create([
           'id'         => Str::uuid(),
           'protocolo_id' => $protocolo->id,
           'user_id'    => $usuario->id,
           'descricao'  => 'Protocolo analisado pela equipe técnica. Em andamento.',
           'status'     => 'in_progress',
       ]);

       ProtocoloAtualizacao::create([
           'id'         => Str::uuid(),
           'protocolo_id' => $protocolo->id,
           'user_id'    => $usuario->id,
           'descricao'  => 'Serviço concluído com sucesso e verificado no local.',
           'status'     => 'approved',
       ]);
        

    }
}
