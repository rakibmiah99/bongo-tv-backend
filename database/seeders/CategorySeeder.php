<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'BongPlay House'],
            ['name' => 'Movies'],
            ['name' => 'Drama'],
            ['name' => 'Series'],
            ['name' => 'TV'],
            ['name' => 'Shorts'],
            ['name' => 'Discover'],
            ['name' => 'Coming Soon']
        ];
        Category::factory()->createMany($data);
    }
}
