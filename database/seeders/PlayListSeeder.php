<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\PlayList;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('play_lists')->truncate();
        User::where('type', '!=', UserType::Admin->value)->each(function($item){
            PlayList::create(['user_id' => $item->id]);
        });
    }
}
