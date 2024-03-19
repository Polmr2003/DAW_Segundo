<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'duracion' => fake()->time(),
            'fechas' => fake()->date(),
            'idiomas' => fake()->randomElement($idioma=['español', 'inglés', 'francés', 'alemán', 'italiano']),
            'precio' => fake()->numerify(),
            'valoracion' => fake()->numberBetween(1, 5)
        ];
    }
}
