<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtualizacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atualizacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requisicao_id')->unsigned();
            $table->string('titulo_atualizacao', 45)->nullable();
            $table->string('atualizacao');
            $table->string('usuario', 45);
            $table->timestamps();
        });

        Schema::table('atualizacaos', function (Blueprint $table) {
            $table->foreign('requisicao_id')
                  ->references('id')->on('requisicaos')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atualizacaos');
    }
}
