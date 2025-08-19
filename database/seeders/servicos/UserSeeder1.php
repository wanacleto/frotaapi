<?php

namespace Database\Seeders;

use App\Models\User;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Inserir um usuário diretamente
         User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // Lembre-se de usar bcrypt para a senha
        ]);

        // Inserir mais usuários, se necessário
        User::create([
            'name' => 'Enercon User',
            'email' => 'enercon@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
