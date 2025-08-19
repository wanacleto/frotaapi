<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin\Chatpovo\Cidade;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Recupera duas cidades existentes
        $cidades = Cidade::inRandomOrder()->take(2)->pluck('id');

        if ($cidades->count() < 2) {
            $this->command->error('É necessário ter pelo menos 2 cidades cadastradas para rodar este seeder.');
            return;
        }

        User::create([
            'id'         => Str::uuid(),
            'cidade_id'  => $cidades[0],
            'nome'       => 'Admin - Anaurilandia',
            'social'     => '@anaurilandia',
            'email'      => 'admin@anaurilandia.ms.gov.br',
            'password'   => bcrypt('12345678'),
            'cpf'        => '12345678901',
            'telefone'   => '(67) 99999-1111',
            'ativo'  => true,
            'key'        => Str::uuid(),
        ]);

        User::create([
            'id'         => Str::uuid(),
            'cidade_id'  => $cidades[1],
            'nome'       => 'Admin - Santa Rita do Pardo',
            'social'     => null,
            'email'      => 'admin@santaritadopardo.ms.gov.br',
            'password'   => bcrypt('12345678'),
            'cpf'        => '98765432100',
            'telefone'   => '(67) 99999-2222',
            'ativo'  => true,
            'key'        => Str::uuid(),
        ]);

        User::create([
            'id'         => Str::uuid(),
            'cidade_id'  => $cidades[1],
            'nome'       => 'Admin - Enercon',
            'social'     => null,
            'email'      => 'admin@enercon.com.br',
            'password'   => bcrypt('12345678'),
            'cpf'        => '12345678902',
            'telefone'   => '(67) 99999-33333',
            'ativo'  => true,
            'key'        => Str::uuid(),
        ]);

    }
}
