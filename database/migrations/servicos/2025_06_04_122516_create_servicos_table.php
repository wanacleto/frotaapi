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
        Schema::create('servicos', function (Blueprint $table) {

            $table->uuid('id')->primary(); 
            // $table->bigIncrements('serial');            
            $table->bigInteger('serial')->default(1); 
            $table->uuid('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');

            $table->string('api')->nullable();

            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
            $table->string('cor')->default('#ffab11');
            $table->string('icone')->default('cogs');

            $table->integer('ordem')->default(1);
            $table->string('tipo')->default('form'); //form, telefone, whatzap, msg, link, personalizado
            $table->string('conteudo')->nullable();

            $table->boolean('fotos')->default(true);
            $table->integer('fotos_maximas')->default(4);
            $table->boolean('fotos_obrigatoria')->default(false);

            $table->boolean('localizacao')->default(true);
            $table->boolean('localizacao_obrigatoria')->default(false);

            $table->boolean('customizado')->default(false);

            $table->boolean('ativo')->default(true);
            $table->uuid('key')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
