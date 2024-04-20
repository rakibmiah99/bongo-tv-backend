<?php

namespace Database\Seeders;

use App\Models\MovieSeason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = MovieSeason::factory()->count(6)->make();
        $data->each(function($item){
            if(!MovieSeason::where('movie_id', $item['movie_id'])->exists()){
                MovieSeason::firstOrCreate($item->toArray());
            }
        });
    }
}
