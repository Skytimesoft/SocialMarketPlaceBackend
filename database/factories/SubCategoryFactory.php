<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ids = Category::all()->pluck('id')->toArray();
        $rand_key = array_rand($ids);

        return [
            'name' => fake()->word(),
            'category_id' => $ids[$rand_key]
        ];
    }
}