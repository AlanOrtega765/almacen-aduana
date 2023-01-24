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
        Schema::create('persona', function (Blueprint $table) {
            $table->id('id_person');
            $table->string('tipo_doc_p', 20);
            $table->string('nro_id_person', 20);
            $table->string('nombre_p', 40);
            $table->string('apellido_p', 40);
            $table->string('dirección_p', 50);
            $table->string('nacionalidad_p', 30);
            $table->integer('reincidente');

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
        Schema::dropIfExists('persona');
    }
};
