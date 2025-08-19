<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin\Chatpovo\Cidade;
use App\Models\Admin\Chatpovo\Usuario;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Usuario::create([
            'id'            => Str::uuid(),
            'nome'          => 'Admin',
            'social'        => '@admin',
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('password'),
            'cpf'           => '12345678901',
            'telefone'      => '(67) 91234-5678',
            'cep'           => '79000-000',
            'endereco'      => 'Rua das Flores',
            'numero'        => '123',
            'bairro'        => 'Centro',
            'cidade'        => 'Campo Grande',
            'uf'            => 'MS',
            'foto_perfil'   => 'carlos.jpg',
            'ativo'         => true,
            'key'           => Str::uuid(),
        ]);

        Usuario::create([
            'id'            => Str::uuid(),
            'nome'          => 'User',
            'social'        => null,
            'email'         => 'user@user.com',
            'password'      => bcrypt('password'),
            'cpf'           => '98765432100',
            'telefone'      => '(67) 99876-5432',
            'cep'           => '79001-111',
            'endereco'      => 'Av. Afonso Pena',
            'numero'        => '456',
            'bairro'        => 'Bela Vista',
            'cidade'        => 'Campo Grande',
            'uf'            => 'MS',
            'foto_perfil'   => 'luciana.png',
            'ativo'         => false,
            'key'           => Str::uuid(),
        ]);

    }
}
