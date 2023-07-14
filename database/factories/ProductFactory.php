<?php

namespace Database\Factories;

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
            'title' => fake()->sentence(),
            'description' => '',
            'stock' => rand(1, 10000),
            'price' => rand(1, 10) / 1000,
            'category_id' => rand(1, 20),
            'owner_id' => 1,
        ];
    }
}
