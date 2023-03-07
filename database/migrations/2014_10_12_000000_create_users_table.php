<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password')->unique();
            $table->string('rut');
            $table->string('nombre_func', 50);
            $table->string('apellido_p', 50);
            $table->string('apellido_m', 30);
            $table->integer('numero_rol');
            $table->boolean('estado');
            $table->string('privilegio', 20);
            $table->rememberToken();
            $table->timestamps();
            //Agregar IP
            //Agregar PC en el que se realizo la conexion y sistema operativo

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
};
