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
        Schema::create('cidades', function (Blueprint $table) {

            $table->uuid('id')->primary();
            // $table->bigIncrements('serial'); 
            $table->bigInteger('serial')->default(1); 
            $table->string('nome')->nullable();
            $table->string('slug')->nullable();
            $table->char('estado', 2)->nullable();            
            $table->string('nome_banco_dados')->nullable();
            $table->string('brasao')->nullable();
            $table->string('logo_prefeitura')->nullable();
            $table->string('cor_principal')->default('#fbbf24');
            $table->string('telefone_prefeitura')->nullable();
            $table->string('email_ouvidoria')->nullable();
            $table->string('site')->nullable();

            $table->boolean('ativo')->default(true);            
            $table->uuid('key')->unique();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cidades');
    }
};
