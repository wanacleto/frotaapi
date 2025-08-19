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
        Schema::create('protocolo_fotos', function (Blueprint $table) {
           
            $table->uuid('id')->primary(); 
            // $table->bigIncrements('serial');            
            $table->bigInteger('serial')->default(1); 
            $table->uuid('protocolo_id');
            $table->foreign('protocolo_id')->references('id')->on('protocolos')->onDelete('cascade');

            $table->string('foto')->nullable();
            
            $table->uuid('key')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocolo_fotos');
    }
};
