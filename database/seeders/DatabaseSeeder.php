<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminCredentialSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            FilmIndustrySeeder::class,
            GenericSeeder::class,
            CelebrityProfileSeeder::class,
            MovieSeeder::class,
            MoviesCategorySeeder::class,
            MoviesGenericSeeder::class,
            CategorySliderSeeder::class,
            LikeDislikeSeeder::class,
        ]);
    }
}
