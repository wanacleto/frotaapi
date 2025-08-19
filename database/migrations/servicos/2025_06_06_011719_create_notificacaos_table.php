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
        Schema::create('notificacoes', function (Blueprint $table) {
            
            $table->uuid('id')->primary(); 
            // $table->bigIncrements('serial');            
            $table->bigInteger('serial')->default(1); 
            $table->uuid('protocolo_id');
            $table->foreign('protocolo_id')->references('id')->on('protocolos')->onDelete('cascade');

            // $table->uuid('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('user_id')->nullable()->index();
            $table->string('gestor_id')->nullable()->index();
            
            $table->enum('tipo', ['novo', 'atualizacao']);
            $table->string('titulo')->nullable();
            $table->text('mensagem')->nullable();
            $table->boolean('lida')->default(false);       
            
            $table->uuid('key')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacoes');
    }
};
