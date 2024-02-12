<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => 'PRO_COD_'. $this->faker->text($maxNbChars = 5),
            'modelo' => 'Modelo ' . $this->faker->text($maxNbChars = 10),
            'fabricante' => $this->faker->name . ' & Company',
            'descripcion' => $this->faker->text($maxNbChars = 100),
            'imagen' => $this->faker->numberBetween(1, 10) . '.png',
            'stock' => $this->faker->numberBetween(15, 600),
            'estado' => $this->faker->randomElement(['activo', 'roto', 'desaparecido']),
            'localizacion_id' => $this->faker->numberBetween(1, 15),
            'categoria_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
