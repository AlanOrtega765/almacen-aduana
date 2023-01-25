<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Retencion>
 */
class RetencionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'fecha_reten' => fake()->date(),
            'fecha_venc' => fake()->date(),
            'franquicia' => fake()->randomDigit([0, 1]),
            'estado' => fake()->randomElement(['Vigente', 'Vencido']),

        ];
    }
}
