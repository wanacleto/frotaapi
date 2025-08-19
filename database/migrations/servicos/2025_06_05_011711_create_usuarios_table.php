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
        Schema::create('usuarios', function (Blueprint $table) {

            $table->uuid('id')->primary();      
            // $table->bigIncrements('serial');       
            $table->bigInteger('serial')->default(1); 
            $table->uuid('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');
             
            $table->string('nome')->nullable();
            $table->string('social')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf', 11)->nullable()->unique();
            $table->string('telefone')->nullable();

            $table->string('cep', 9)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
                  
            $table->string('foto_perfil')->nullable();
            // $table->timestamp('foto_atualizada_em')->nullable();
            // $table->string('face_id', 255)->nullable();
            // $table->json('face_attributes')->nullable();
            // $table->boolean('face_verified')->default(false);
            // $table->datetime('face_verified_at')->nullable();
            // $table->binary('face_image')->nullable();
            // $table->string('face_url', 255)->nullable();

            $table->boolean('ativo')->default(true);
            $table->uuid('key')->unique();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
