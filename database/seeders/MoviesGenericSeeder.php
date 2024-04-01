<?php

namespace Database\Seeders;

use App\Models\MoviesGeneric;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesGenericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = MoviesGeneric::factory()->count(50)->make();
        $data->each(function ($item){
            MoviesGeneric::firstOrCreate($item->toArray());
        });
    }
}
