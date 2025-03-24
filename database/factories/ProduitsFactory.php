<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Catigorie;
use App\Models\Ingredients;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produits>
 */
class ProduitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'disc' => $this->faker->sentence(),
            'emporter' => $this->faker->randomFloat(2, 10, 100),
            'livraison' => $this->faker->randomFloat(2, 10, 100),
            'title' => $this->faker->sentence(),
        ];
    }
}