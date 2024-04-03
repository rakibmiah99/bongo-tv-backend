<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\PlayList;
use App\Models\PlayListMovie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayListMovie>
 */
class PlayListMovieFactory extends Factory
{
    protected $model = PlayListMovie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $play_lists = PlayList::pluck('id');
        $movies = Movie::pluck('id');
        return [
            'play_list_id' => fake()->randomElement($play_lists),
            'movie_id' => fake()->randomElement($movies)
        ];
    }
}
