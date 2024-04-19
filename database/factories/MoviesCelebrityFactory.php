<?php

namespace Database\Factories;

use App\Models\CelebrityProfile;
use App\Models\GenericType;
use App\Models\Movie;
use App\Models\MoviesCelebrity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoviesCelebrity>
 */
class MoviesCelebrityFactory extends Factory
{
    protected $model = MoviesCelebrity::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movies = Movie::pluck('id');
        $celebrity_profiles = CelebrityProfile::pluck('id');
        return [
            'movie_id' => fake()->randomElement($movies),
            'celebrity_profile_id' => fake()->randomElement($celebrity_profiles)
        ];
    }
}
