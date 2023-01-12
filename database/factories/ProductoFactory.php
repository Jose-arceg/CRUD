<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Producto;

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
    public function definition()
    {
        return [
            /*'categoria_id' => Categoria::factory(),
            'producto_nombre' => $this->faker->name(),
            'producto_descripcion' => $this->faker->text($maxNbChars = 30),
            'producto_stock' => $this->faker->numberBetween(1,15),
            'producto_valor' => $this->faker->numberBetween(1000,50000),*/
        ];
    }
}
