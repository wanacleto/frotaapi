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
        Schema::create('servico_formularios', function (Blueprint $table) {

            $table->uuid('id')->primary();
            // $table->uuid('id')->primary()->default(DB::raw('gen_random_uuid()'));
            $table->uuid('servico_id');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->string('versao', 20)->default('1.0');
            $table->boolean('ativo')->default(true);
            $table->boolean('permite_fotos')->default(true);
            $table->integer('max_fotos')->default(5);
            $table->boolean('fotos_obrigatorias')->default(false);
            $table->boolean('permite_localizacao')->default(true);
            $table->boolean('localizacao_obrigatoria')->default(false);
            $table->timestamps();
        
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
            $table->index('servico_id', 'idx_servico_formularios_servico_id');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servico_formularios');
    }
};
