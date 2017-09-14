<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('requerente', 45);
            $table->string('cpf', 11)->nullable();
            $table->string('descricao');
            $table->string('setor', 45);
            $table->string('justificativa');
            $table->string('usuario', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicaos');
    }
}
