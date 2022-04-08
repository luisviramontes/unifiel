<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('tipo_persona')->nullable();
            $table->string('name')->nullable();
            $table->string('apellido_p')->nullable();
            $table->string('apellido_m')->nullable();
            $table->string('sexo')->nullable();
            $table->string('rfc')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('nombre_aut')->nullable();
            $table->string('telefono')->nullable();
            $table->string('img')->nullable();
            $table->string('tipo_usuario');
            $table->string('funcion');
            $table->string('captura');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
