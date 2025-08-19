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
        Schema::create('sistemas', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->bigInteger('serial')->default(1); 
            // $table->bigIncrements('serial');          
            $table->string('api')->nullable();
            $table->string('nome')->default('Enercon');
            $table->string('logo')->nullable();
            $table->text('descricao')->default('Descrição...');
            $table->string('cor')->default('#ffab11');
            $table->string('icone')->default('cogs');
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
        Schema::dropIfExists('sistemas');
    }
};
