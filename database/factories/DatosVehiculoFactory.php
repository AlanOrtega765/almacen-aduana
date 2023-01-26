<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Datos_Vehiculo>
 */
class DatosVehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'marca_vehiculo'    => fake()-> randomElement(['suzuki', 'mazda', 'mitsubichi', 'chevrolet', 'toyota', 'lamborguini']),
            'nom_d_vehiculo'    => fake()-> randomElement(['suzuki1', 'mazda2', 'mitsubichi3', 'chevrolet4', 'toyota5', 'lamborguini6']),
            'ppu'               => fake()-> randomElement(['CASA-01', 'ASDV-23', 'BGJS-43', 'VSSF-43', 'ETER-34', 'PRNE-01']),
            'tipo_vehiculo'     => fake()-> randomElement(['AUTOMOVIL', 'CAMION', 'CAMIONETA', 'STATION WAGON']),
            'modelo_vehiculo'   => fake()-> randomElement(['DEMIO', 'URUS', 'FIT', 'CORVETTE', 'YARIS', 'MUSTANG']),
            'chasis_veh'        => fake()-> randomElement(['32JK123', '345JKHDS', '546HJK23', '56JK34HSD', '7564KJDSF', '34H34H21F']),
            'n_motor_vehiculo'  => fake()-> numberBetween(12312313, 99999999),
            'anho_fabric'       => fake()-> numberBetween(1970, 2023),
            'origen_veh'        => fake()-> randomElement(['japon', 'japon', 'japon', 'EEUU', 'japon', 'Italia']),



        ];
    }
}
