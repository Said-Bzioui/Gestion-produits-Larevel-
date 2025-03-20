<?php

namespace Database\Factories;

use App\Models\Ingredients;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'disc' => $this->faker->paragraph(),
            'emporter' => $this->faker->numerify(),
            'livraison' => $this->faker->numerify(),
            'title' => $this->faker->paragraph(),
            'ingredients' => Ingredients::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}