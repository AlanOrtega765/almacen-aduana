<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'tipo_doc_p' => fake()->randomElement(['CI', 'DNI', 'PASAPORTE']),
            'nro_id_person' => fake()->randomElement(['12345678-9', '19456789-0', '20854980-K']),
            'nombre_p' => fake()->firstName(),
            'apellido_p' => fake()->lastName(),
            'direccion_p' => fake()->streetName(),
            'nacionalidad_p' => fake()->randomElement(['Chilena', 'Peruana', 'Boliviana', 'OTRO']),
            'reincidente' => fake()->randomNumber('0','0', '0', '1'),

        ];
    }
}
