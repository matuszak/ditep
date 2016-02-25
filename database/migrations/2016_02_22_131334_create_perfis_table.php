<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('perfis', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_user')->unsigned();

          $table->string('nome');
          $table->string('final_nome');
          $table->date('data_nascimento');
          $table->string('fone', 15);
          $table->string('fone2', 15);
          $table->string('cpf', 12)->unique();
          $table->timestamps();

          $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
      });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::drop('perfis');
    }
}
