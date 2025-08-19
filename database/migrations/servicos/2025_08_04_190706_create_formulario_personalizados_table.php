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
        Schema::create('formulario_personalizados', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('servico_id');
            $table->string('nome', 100)->nullable();
            $table->string('label', 255)->nullable();
            $table->enum('tipo', [
                'text',
                'textarea', 
                'select',
                'radio',
                'checkbox',
                'date',
                'time',
                'number',
                'phone',
                'email',
                'file',
                'hidden'
            ]);
            $table->boolean('obrigatorio')->default(false);
            $table->integer('ordem')->default(1);
            $table->string('placeholder', 255)->nullable();
            $table->enum('keyboard_type', [
                'default',
                'numeric',
                'phone-pad',
                'email-address',
                'decimal-pad'
            ])->default('default');
            $table->boolean('multiline')->default(false);
            $table->integer('number_of_lines')->default(1);
            $table->json('validacao')->nullable();
            $table->json('opcoes')->nullable();
            $table->json('condicional')->nullable();
            $table->json('estilo')->nullable();
            $table->boolean('ativo')->default(true);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
            
            // Índices para performance
            $table->index('servico_id', 'idx_formulario_personalizados_servico_id');
            $table->index('ordem', 'idx_formulario_personalizados_ordem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_personalizados');
    }
};
