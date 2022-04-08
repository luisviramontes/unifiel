<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentacionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentacion_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned ();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('tipo_documento');
            $table->string('documento');
            $table->string('estado');
            $table->string('captura');
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
        Schema::drop('documentacion_user');
    }
}
