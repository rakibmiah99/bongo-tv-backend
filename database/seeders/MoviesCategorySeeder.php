<?php

namespace Database\Seeders;

use App\Models\MoviesCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = MoviesCategory::factory()->count(1000)->make();
        $data->each(function ($item){
           MoviesCategory::firstOrCreate($item->only('movie_id', 'category_id', 'sub_category_id'));
        });
    }
}
