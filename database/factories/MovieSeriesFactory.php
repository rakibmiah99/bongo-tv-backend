<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\MovieSeason;
use App\Models\MovieSeries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieSeries>
 */
class MovieSeriesFactory extends Factory
{
    protected $model = MovieSeries::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $season = MovieSeason::pluck('id');
        $season[] = null;

        $series_movies = Movie::pluck('id');
        $series = [$series_movies[3],$series_movies[4],$series_movies[5]];
        $movies = Movie::whereNotIn('id', array_merge([$series_movies[0],$series_movies[1], $series_movies[2]], $series))->pluck('id');
        $series[] = null;

        $season_id = fake()->randomElement($season);
        $series_id = fake()->randomElement($series);
        return [
            'movie_season_id' => $series_id ? null : $season_id,
            'series_movie_id' => $season_id ? null : $series_id ,
            'movie_id' => fake()->randomElement($movies)
        ];
    }
}
