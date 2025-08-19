<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin\Chatpovo\Cidade;
use App\Models\Admin\Chatpovo\Usuario;
use App\Models\Admin\Chatpovo\Protocolo;
use App\Models\Admin\Chatpovo\ProtocoloFoto;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProtocoloFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $protocolo = Protocolo::inRandomOrder()->first();

        if (!$protocolo) {
            $this->command->error('É necessário ter pelo menos 1 protocolo cadastrado.');
            return;
        }

        ProtocoloFoto::create([
            'id'           => Str::uuid(),
            'protocolo_id' => $protocolo->id,
            'foto'         => 'fotos/protocolo1_foto1.jpg',
            'key'          => Str::uuid(),
        ]);

        ProtocoloFoto::create([
            'id'           => Str::uuid(),
            'protocolo_id' => $protocolo->id,
            'foto'         => 'fotos/protocolo1_foto2.jpg',
            'key'          => Str::uuid(),
        ]);
        

    }
}
