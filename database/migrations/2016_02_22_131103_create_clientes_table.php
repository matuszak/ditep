<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('id_setor')->unsigned();
            $table->string('materia');
            $table->string('email');
            $table->string('fone', 15);
            $table->string('fone2', 15);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('id_setor')->references('id')->on('setores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
