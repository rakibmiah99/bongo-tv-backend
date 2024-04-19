<?php

namespace Database\Seeders;

use App\Models\MoviesCelebrity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesCelebritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = MoviesCelebrity::factory()->count(30)->make();
        $data->each(function ($item){
            $item->firstOrCreate($item->toArray());
        });
    }
}
