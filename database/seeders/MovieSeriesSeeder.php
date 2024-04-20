<?php

namespace Database\Seeders;

use App\Models\MovieSeries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = MovieSeries::factory()->count(100)->make();
        $data->each(function ($item){
            $existsSeries = MovieSeries::where($item->only('series_movie_id', 'movie_id'))->exists();
            $existsSeason = MovieSeries::where($item->only('movie_season_id', 'movie_id'))->exists();
            if(!($item['series_movie_id'] == null  && $item['movie_season_id'] == null) && !$existsSeason && !$existsSeries){
                MovieSeries::create($item->toArray());
            }
        });
    }
}
