<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data  = SubCategory::factory()
            ->count(150)
            ->make()
            ->select('name','slug', 'category_id')
            ->unique(function ($item){
                return $item;
            });

       SubCategory::factory()->createMany($data);
    }
}
