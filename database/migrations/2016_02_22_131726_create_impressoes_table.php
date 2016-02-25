<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpressoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impressoes', function (Blueprint $table){
          $table->increments('id');
          $table->integer   ('id_user')->unsigned();
          $table->integer   ('id_toner')->unsigned();
          $table->integer   ('id_cliente')->unsigned();
          $table->integer   ('id_impressora')->unsigned();

          $table->string    ('imp_tipo', 40);
          $table->string    ('imp_modo', 1);
          $table->boolean   ('imp_fv');
          $table->integer   ('imp_laudas');
          $table->integer   ('imp_quantidade');
          $table->date      ('imp_data');
          $table->mediumText('imp_obs');

          $table->foreign('id_user')->references('id')->on('users');
          $table->foreign('id_toner')->references('id')->on('toners');
          $table->foreign('id_cliente')->references('id')->on('clientes');
          $table->foreign('id_impressora')->references('id')->on('impressoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::drop('impressoes');
    }
}
