<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Localizacion>
 */
class LocalizacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ciudad'=> $this->faker->city,
            'nombre_edificio' => 'Edf. '. $this->faker->text($maxNbChars = 10),  
            'direccion' => $this->faker->streetAddress,
            'numero_sala' => $this->faker->numberBetween(1, 15),
        ];
    }
}
