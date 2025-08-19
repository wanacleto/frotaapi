<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin\Chatpovo\Cidade;
use App\Models\Admin\Chatpovo\Usuario;
use App\Models\Admin\Chatpovo\Protocolo;
use App\Models\Admin\Chatpovo\Notificacao;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $protocolo = Protocolo::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        if (!$protocolo || !$user) {
            $this->command->error('É necessário ter pelo menos 1 protocolo e 1 usuário cadastrados.');
            return;
        }

        Notificacao::create([
            'id'           => Str::uuid(),
            'protocolo_id' => $protocolo->id,
            'user_id'      => $user->id,
            'tipo'         => 'novo',
            'titulo'       => 'Novo protocolo registrado',
            'mensagem'     => 'Um novo protocolo foi registrado com sucesso.',
            'lida'         => false,
            'key'          => Str::uuid(),
        ]);
        
        Notificacao::create([
            'id'           => Str::uuid(),
            'protocolo_id' => $protocolo->id,
            'user_id'      => $user->id,
            'tipo'         => 'novo',
            'titulo'       => 'Novo protocolo registrado',
            'mensagem'     => 'Um novo protocolo foi registrado com sucesso.',
            'lida'         => false,
            'key'          => Str::uuid(),
        ]);

        Notificacao::create([
            'id'           => Str::uuid(),
            'protocolo_id' => $protocolo->id,
            'user_id'      => $user->id,
            'tipo'         => 'atualizacao',
            'titulo'       => 'Atualização no protocolo',
            'mensagem'     => 'O status do seu protocolo foi atualizado para "in_progress".',
            'lida'         => true,
            'key'          => Str::uuid(),
        ]);
    }
}
