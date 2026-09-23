<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cat_name' => fake()->words(2, true),
            'cat_description' => fake()->sentence(),
            'status' => 1,
        ];
    }
}