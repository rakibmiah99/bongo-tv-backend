<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Movie;
use App\Models\MoviesCategory;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoviesCategory>
 */
class MoviesCategoryFactory extends Factory
{
    protected $model = MoviesCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movies = Movie::pluck('id');
        $categories = Category::pluck('id');
        $sub_categories = SubCategory::pluck('id');
        $sub_categories[] = null;
        $priority = [1,2,3];
        return [
            'movie_id' => fake()->randomElement($movies),
            'category_id' => fake()->randomElement($categories),
            'sub_category_id' => fake()->randomElement($sub_categories),
            'priority' => fake()->randomElement($priority),
        ];
    }
}
