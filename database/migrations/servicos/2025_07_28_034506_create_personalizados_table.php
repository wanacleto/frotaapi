<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personalizados', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->bigIncrements('serial');           
            $table->bigInteger('serial')->default(1); 
            // Relacionamento com serviços
            $table->uuid('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                            
            $table->text('descricao')->nullable(); // Descrição obrigatória
         
            $table->uuid('key')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalizados');
    }
};
