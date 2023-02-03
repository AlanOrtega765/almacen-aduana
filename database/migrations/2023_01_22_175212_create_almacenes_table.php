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
        Schema::create('almacenes', function (Blueprint $table) {
            $table->id('id_almacen');
            $table->string('nombre_almc', 40);
            $table->string('avanzada', 40);
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
        Schema::dropIfExists('almacenes');
    }
};

/*Datos para llenar la tabla de almacenes inicialmente
INSERT INTO `almacenes` (`id_almacen`, `nombre_almc`, `avanzada`, `created_at`, `updated_at`) VALUES
(1, 'Principal', 'Arica', '2023-01-31 11:13:33', '2023-01-31 11:13:33'),
(2, 'Hansen', 'Arica', '2023-01-31 11:13:45', '2023-01-31 11:13:45'),
(3, 'Sitrans', 'Arica', '2023-01-31 11:14:00', '2023-01-31 11:14:00'),
(4, 'Principal', 'Chacalluta', '2023-01-31 11:14:14', '2023-01-31 11:14:14'),
(5, 'Principal', 'Chungara', '2023-01-31 11:14:24', '2023-01-31 11:14:24'),
(6, 'Principal', 'Visviri', '2023-01-31 11:14:33', '2023-01-31 11:14:33');
*/
