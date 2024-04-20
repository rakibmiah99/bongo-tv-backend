<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\MovieSeason;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieSeason>
 */
class MovieSeasonFactory extends Factory
{
    protected $model = MovieSeason::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movies = Movie::pluck('id');
        return [
            'movie_id' => fake()->randomElement([$movies[0], $movies[1], $movies[3]]),
            'name' => fake()->name(),
            'description' => fake()->sentence(120)
        ];
    }
}
