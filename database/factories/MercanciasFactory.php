<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mercancias>
 */
class MercanciasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cantidad_bulto' => fake()->randomDigitNotZero(),
            'nombre_merc' => fake()->text(100),
            'peso' => fake()->randomElement(['120', '5', '200']),
            'valor_mercancia' => fake()->randomElement(['1000', '1100', '1200', '1300', '1500']),

        ];
    }
}
