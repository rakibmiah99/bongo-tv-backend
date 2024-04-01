<?php

namespace Database\Seeders;

use App\Models\CategorySlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = CategorySlider::factory()->count(40)->make();
        $data->each(function($item){
            CategorySlider::firstOrCreate($item->toArray());
        });
    }
}
