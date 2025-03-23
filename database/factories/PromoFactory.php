<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => Str::upper(Str::random(5)) . rand(100, 999), // 5 أحرف + 3 أرقام
            'discount' => $this->faker->numberBetween(5, 50), // خصم بين 5% و 50%
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 year'), // تاريخ انتهاء عشوائي خلال سنة
            'active' => $this->faker->boolean(80), // 80% تكون نشطة، 20% غير نشطة
        ];
    }
}