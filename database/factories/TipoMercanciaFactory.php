<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tipo_Mercancia>
 */
class TipomercanciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           /* 'nombre_merc' => fake()->randomElement(['polera', 'cigarros', 'zapatillas', 'zapatos', 'ropa-interior']),
            'cantidad' => fake()->randomDigit(),
            'valor_mercancia' => fake()->randomNumber(),
*/
        ];
    }
}
