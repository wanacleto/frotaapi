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
        Schema::create('formularios', function (Blueprint $table) {

            $table->uuid('id')->primary();
            // $table->uuid('id')->primary()->default(DB::raw('gen_random_uuid()'));
            $table->uuid('formulario_id');
            $table->string('nome', 100);
            $table->string('label');
            $table->string('tipo', 50);
            $table->boolean('obrigatorio')->default(false);
            $table->integer('ordem')->default(1);
            $table->string('placeholder')->nullable();
            $table->string('keyboard_type', 50)->default('default');
            $table->boolean('multiline')->default(false);
            $table->integer('number_of_lines')->default(1);
            $table->jsonb('validacao')->nullable();
            $table->jsonb('opcoes')->nullable();
            $table->jsonb('condicional')->nullable();
            $table->jsonb('estilo')->nullable();
            $table->boolean('ativo')->default(true);
            $table->timestamps();

            $table->foreign('formulario_id')->references('id')->on('servico_formularios')->onDelete('cascade');
            $table->index('formulario_id', 'idx_formularios_formulario_id');
            $table->index('ordem', 'idx_formulario_ordem');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
