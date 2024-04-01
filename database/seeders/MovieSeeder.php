<?php

namespace Database\Seeders;

use App\Enums\ImageSize;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = Movie::factory()->count(40)->make();
        $movies->each(function ($movie){
            $data = $movie->only(['name', 'description', 'play_mode', 'rating', 'visibility', 'film_industry_id', 'trailer_youtube_link']);
            $data = Movie::create($data);
            $data->addMediaFromUrl($movie[ImageSize::w16xh9->value])->toMediaCollection(ImageSize::w16xh9->value);
            $data->addMediaFromUrl($movie[ImageSize::w9xh16->value])->toMediaCollection(ImageSize::w9xh16->value);
            $data->addMediaFromUrl($movie[ImageSize::w3xh4->value])->toMediaCollection(ImageSize::w3xh4->value);
            $data->addMediaFromUrl($movie[ImageSize::w4xh3->value])->toMediaCollection(ImageSize::w4xh3->value);
        });
    }
}
