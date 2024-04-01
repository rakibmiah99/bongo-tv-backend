<?php

namespace Database\Factories;

use App\Models\CelebrityProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CelebrityProfile>
 */
class CelebrityProfileFactory extends Factory
{
    protected $model = CelebrityProfile::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name,
            'description' => fake()->unique()->sentences(40, true),
            'image' => fake()->imageUrl
        ];
    }
}
