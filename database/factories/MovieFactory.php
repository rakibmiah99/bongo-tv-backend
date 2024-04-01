<?php

namespace Database\Factories;

use App\Enums\ImageSize;
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
    protected $model = Movie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pixel = 120;
        $film_industry = FilmIndustry::pluck('id');
        $categories = ['abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'];
        $_3x4 = fake()->imageUrl(3 * $pixel, 4 * $pixel, $categories[array_rand($categories)], true, null, true);
        $_4x3 = fake()->imageUrl(4 * $pixel, 3 * $pixel, $categories[array_rand($categories)], true, null, true);
        $thumbnail_9x16 = fake()->imageUrl(9 * $pixel , 16 * $pixel , $categories[array_rand($categories)], true, null, true);
        $cover_16x9 = fake()->imageUrl(16 * $pixel, 9 * $pixel, $categories[array_rand($categories)], true, null, true);

        return [
            'name' => ucwords(fake()->words(3, true)),
            'description' => fake()->sentences(20, true),
            'play_mode' => fake()->randomElement(MoviePlayMode::toArray()),
            'rating' => fake()->numberBetween(1, 5),
            'visibility' => fake()->randomElement([true, false]),
            'film_industry_id' => fake()->randomElement($film_industry),
            'trailer_youtube_link' => 'https://www.youtube.com/embed/8yK69sWq9rU?si=byqvFMlAHtJvnON5',
            'trailer_vimeo_link' => '',
            ImageSize::w9xh16->value => $thumbnail_9x16,
            ImageSize::w16xh9->value => $cover_16x9,
            ImageSize::w4xh3->value => $_4x3,
            ImageSize::w3xh4->value => $_3x4
        ];
    }
}
