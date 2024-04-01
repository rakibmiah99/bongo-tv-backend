<?php

namespace Database\Seeders;

use App\Models\CelebrityProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CelebrityProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = CelebrityProfile::factory()->count(20)->make();
        $data->each(function ($celebrity){
            $profile = $celebrity->create($celebrity->only('name', 'description'));
            $profile->addMediaFromUrl($celebrity['image'])->toMediaCollection();
        });
    }
}
