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
        Schema::create('admin_users', function (Blueprint $table) {
            
            $table->uuid('id')->primary();
            // $table->bigIncrements('serial'); 
            $table->bigInteger('serial')->default(1); 
            $table->string('nome');
            $table->string('social')->nullable();
            $table->string('email')->unique();
            $table->string('password');

            $table->string('cpf', 11)->nullable()->unique();
            $table->string('telefone')->nullable();

            $table->boolean('ativo')->default(true);
            $table->uuid('key')->unique();

            $table->rememberToken();            
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
};
