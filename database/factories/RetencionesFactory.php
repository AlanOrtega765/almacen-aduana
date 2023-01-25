<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RetentionSlip>
 */
class RetencionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha_boleta' => fake()->date(),
            'tipo_doc_imputado' => fake()->randomElement(['DNI', 'PASAPORTE', 'CI']),
            'n_doc_imputado' => fake()->randomElement(['12345678-9', '19456789-0', '20854980-K']),
            'nombres_imputado' => fake()->firstName(),
            'apellidos_imputado' => fake()->lastName(),
            'nacionalidad' => fake()->randomElement(['Chilena', 'Peruana', 'Boliviana']),
            'direccion' => fake()->streetName(),
            'ciudad' => fake()->city(),
            'franquicia' => fake()->randomElement(['SI', 'NO']),
            'descripcion' => fake()->text(50),
            'bultos' => fake()->randomDigit(),
            'peso' => fake()->randomElement(['120Kg', '5Kg', '200Kg']),
            'avanzada' => fake()->randomElement(['Chacalluta', 'Arica', 'Chungara', 'Hansen', 'Sitrans', 'Visviri']),
            'almacen' => fake()->randomElement(['Chacalluta', 'Arica', 'Chungara', 'Hansen', 'Sitrans', 'Visviri']),
            'observaciones' => fake()->text(200),
            'plazo_maximo' => fake()->date(),
            'estado' => fake()->randomElement(['Vigente', 'Vencido']),
        ];
    }
}
