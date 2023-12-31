<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Product::CURRENCY => Currency::factory(),
            Product::AMOUNT => fake()->numberBetween(5, 20),
            Product::NAME => fake()->name(),
            Product::PRICE => fake()->numberBetween(0, 99999),
        ];
    }
}
