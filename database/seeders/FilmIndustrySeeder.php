<?php

namespace Database\Seeders;

use App\Models\FilmIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["name" =>"Hollywood (English)"],
            ["name" =>"Dhallywood (Bengali)"],
            ["name" =>"Bollywood (Hindi)"],
            ["name" =>"Tollywood (Telugu)"],
            ["name" =>"Kollywood (Tamil)"],
            ["name" =>"Mollywood (Malayalam)"],
            ["name" =>"Sandalwood (Kannada)"],
            ["name" =>"Marathi cinema"],
            ["name" =>"Odia cinema"],
            ["name" =>"Assamese cinema"],
            ["name" =>"Bengali cinema"],
            ["name" =>"Gujarati cinema"],
            ["name" =>"Punjabi cinema"],
            ["name" =>"Haryanvi cinema"],
            ["name" =>"Bhojpuri cinema"],
            ["name" =>"Konkani cinema"],
            ["name" =>"Manipuri cinema"],
            ["name" =>"Meitei cinema"],
        ];
        FilmIndustry::factory()->createMany($data);
    }
}
