<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call(CidadeSeeder::class);
        // $this->call(UserSeeder::class);            
        // $this->call(SistemaSeeder::class);   
        // $this->call(ServicosSeeder::class);   
        // $this->call(ProtocoloSeeder::class);      
       
       
        $this->call(FormularioSeeder::class);
        $this->call(FormularioCampoSeeder::class);  
        $this->call(FormularioCampoPersonalizadoSeeder::class); 


        // $this->call(UsuarioSeeder::class);
        // $this->call(NotificacaoSeeder::class);        
        // $this->call(ProtocoloAtualizacaoSeeder::class);
        // $this->call(ProtocoloFotoSeeder::class);
    }
}
