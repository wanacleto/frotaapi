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
        Schema::create('protocolos', function (Blueprint $table) {
            
            $table->uuid('id')->primary(); 
            // $table->bigIncrements('serial');            
            $table->bigInteger('serial')->default(1); 

            $table->uuid('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');

            $table->uuid('servico_id')->nullable();
            //$table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
     
            $table->string('tipo_protocolo')->nullable();
           
            $table->string('cep', 9)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
            
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->text('descricao')->nullable();
            $table->string('telefone')->nullable();
            $table->enum('status', ['pendente', 'progresso', 'aprovado', 'rejeitado', 'cancelado'])->default('pendente');
        
            $table->integer('atualizacoes_nao_lidas')->default(0);
            $table->boolean('precisa_resposta')->default(false);
            
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
        Schema::dropIfExists('protocolos');
    }
};
