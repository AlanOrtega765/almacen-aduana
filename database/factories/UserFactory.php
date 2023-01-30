<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake()->userName(),
            'password' => Hash::make('123456789'), // password
            'rut' => fake()->randomElement(['12345678-9', '23456789-0', '21456789-3', '19675435-K']),
            'nombre_func'=> fake()->firstName(),
            'apellido_p'=> fake()->lastName(),
            'apellido_m'=> fake()->lastName(),
            'numero_rol' => fake()->randomNumber(),
            'estado' => fake()->boolean(),
            'privilegio' => fake()->randomElement(['Auditor', 'Almacenista', 'Administrador']),
        ];
    }
}
