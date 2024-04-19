<?php

namespace Database\Seeders;

use App\Models\WatchHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WatchHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = WatchHistory::factory()->count(30)->make();
        $data->each(function ($item){
            $item->firstOrCreate($item->toArray()\);
        });
    }
}
