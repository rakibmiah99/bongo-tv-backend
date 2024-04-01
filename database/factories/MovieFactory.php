<?php

namespace Database\Factories;

use App\Enums\MoviePlayMode;
use App\Models\FilmIndustry;
use App\Models\Movie;
use App\Traits\Faker\MovieTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    use MovieTrait;
    protected $model = Movie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $film_industry = FilmIndustry::pluck('id');
        return [
            'name' => ucwords(fake()->words(3, true)),
            'description' => fake()->sentences(20, true),
            'play_mode' => fake()->randomElements(MoviePlayMode::toArray()),
            'rating' => fake()->numberBetween(1, 5),
            'visibility' => fake()->randomElements([true, false]),
            'film_industry_id' => fake()->randomElements($film_industry),
            'trailer_youtube_link' => '',
            'trailer_vimeo_link' => '',
            'thumbnail' => '',
            'cover' => '',
            'cover_mobile' => '',
            'cover_tab' => '',

        ];
    }
}
