<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unidades')->insert([
            ['nome' => 'UBS Central', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'UBS Jardim América', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Hospital Municipal', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
