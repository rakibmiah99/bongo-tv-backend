<?php

namespace Database\Factories;

use App\Models\GenericType;
use App\Models\Movie;
use App\Models\MoviesGeneric;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoviesGeneric>
 */
class MoviesGenericFactory extends Factory
{
    protected $model = MoviesGeneric::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movies = Movie::pluck('id');
        $generics = GenericType::pluck('id');
        return [
            'movie_id' => fake()->randomElement($movies),
            'generic_type_id' => fake()->randomElement($generics)
        ];
    }
}
