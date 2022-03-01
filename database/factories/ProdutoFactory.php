<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(), 
            'preco' => $this->faker->numberBetween($min = 1, $max = 1000),
            'descricao' => $this->faker->text($maxNbChars = 100), 
            'quantidade' => $this->faker->numberBetween($min = 0, $max = 100), 
            'imagem' => $this->faker->imageUrl($width = 640, $height = 480), 
            'categoria_id' => $this->faker->numberBetween($min = 1, $max = 10)
        ];
    }
}
