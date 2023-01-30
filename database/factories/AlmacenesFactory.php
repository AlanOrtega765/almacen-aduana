<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Almacen>
 */
class AlmacenesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_almc' => ['Chacalluta', 'Arica', 'Chungara', 'Hansen', 'Sitrans', 'Visviri'],
            'avanzada' => ['Chacalluta', 'Arica', 'Chungara', 'Hansen', 'Sitrans', 'Visviri']
        ];
    }
}
