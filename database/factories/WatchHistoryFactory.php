<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\User;
use App\Models\WatchHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WatchHistory>
 */
class WatchHistoryFactory extends Factory
{
    protected $model = WatchHistory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movies = Movie::pluck('id');
        $users = User::pluck('id');
        return [
            'movie_id' => fake()->randomElement($movies),
            'user_id' => fake()->randomElement($users)
        ];
    }
}
