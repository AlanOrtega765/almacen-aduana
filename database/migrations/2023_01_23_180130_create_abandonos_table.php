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
        Schema::create('abandonos', function (Blueprint $table) {
            $table->id('n_oficio');
            $table->date('fecha_oficio');
            $table->date('fecha_venc');
            $table->date('fecha_recepcion')->nullable();
            $table->text('observacion')->nullable();
            $table->string('estado', 20);
            $table->unsignedBigInteger('id_users_fk');
            $table->foreign('id_users_fk')->references('id')->on('users');
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
        Schema::dropIfExists('abandonos');
    }
};
