<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'text' => fake()->paragraph(5),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
