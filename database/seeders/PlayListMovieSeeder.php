<?php

namespace Database\Seeders;

use App\Models\PlayListMovie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayListMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = PlayListMovie::factory()->count(20)->make();
        $data->each(function($item){
           return PlayListMovie::firstOrCreate($item->toArray());
        });
    }
}
