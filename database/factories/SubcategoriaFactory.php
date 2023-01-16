<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Subcategoria;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcategoria>
 */
class SubcategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'categoria_id' => Categoria::factory(),
            'sc_nombre' => $this->faker->name(),
            'sc_descripcion' => $this->faker->text($maxNbChars = 30),
        ];
    }
}
