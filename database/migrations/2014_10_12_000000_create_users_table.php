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
     *
     * Tabla Users, tabla que contendra los atributos que utilizarán los trabajadores de la Aduana
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //identificador Usuarios
            $table->string('username')->unique(); // Nombre de Usuario de los Usuarios
            $table->string('password')->unique(); // Con password
            $table->string('rut');                  //Rut de los usuarios(Funcionarios)
            $table->string('nombre_func', 50);      //Nombre del Funcionario
            $table->string('apellido_p', 50);       //Apellido Paterno Funcionario
            $table->string('apellido_m', 30);       //Apellido Materno Funcionario
            $table->integer('numero_rol');          //Numero de Rol del funcionario (Administrador,)
            $table->boolean('estado');              //Estado (0 o 1) si esta activo o no el funcionario
            $table->string('privilegio', 20);       //Privilegio de los Funcionarios (Administrador, Auditor, Almacenista)
            $table->rememberToken();                //
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
