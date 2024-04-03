<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\LikeDislike;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LikeDislike>
 */
class LikeDislikeFactory extends Factory
{
    protected $model = LikeDislike::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::where('type', '!=', UserType::Admin->value)->pluck('id');
        $movies = Movie::pluck('id');
        $like = fake()->randomElement([true, false]);
        return [
            'user_id' => fake()->randomElement($users),
            'movie_id' => fake()->randomElement($movies),
            'like' => $like,
            'dislike' => !$like,
            'is_favourite' => fake()->randomElement([true, false]),
        ];
    }
}
