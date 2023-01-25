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
        Schema::create('tipomercancias', function (Blueprint $table) {
            $table->foreignId('n_rol_fk')->references('n_rol')->on('mercancias');
            $table->id('id_mercancias');
            $table->string('nombre_merc', 30);
            $table->integer('cantidad');
            $table->integer('valor_mercancia')->nullable();
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
        Schema::dropIfExists('tipomercancias');
    }
};
