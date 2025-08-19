<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->uuid('id')->primary();
            // $table->bigIncrements('serial'); 
            $table->bigInteger('serial')->default(1); 

            $table->uuid('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');

            $table->string('nome');
            $table->string('social')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf', 11)->nullable()->unique();
            $table->string('telefone')->nullable();

            $table->string('foto_perfil')->nullable();
            $table->string('foto_doc')->nullable();

            $table->string('cep', 9)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
            
            $table->enum('situacao', [
                'aguardando_aprovacao',
                'rejeitado_documentacao',
                'reprovado',
                'aprovada',
            ])->default('aguardando_aprovacao');

            $table->text('nota_situacao')->nullable();

            $table->boolean('ativo')->default(false);
            $table->uuid('key')->unique();

            $table->text('fcm_token')->nullable();
            $table->rememberToken();            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}