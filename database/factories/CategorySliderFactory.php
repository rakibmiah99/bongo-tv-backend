<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategorySlider>
 */
class CategorySliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::pluck('id');
        $movies = Movie::pluck('id');
        return [
            'category_id' => fake()->randomElement($categories),
            'movie_id' => fake()->randomElement($movies)
        ];
    }
}
