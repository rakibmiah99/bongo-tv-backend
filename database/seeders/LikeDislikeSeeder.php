<?php

namespace Database\Seeders;

use App\Models\LikeDislike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeDislikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = LikeDislike::factory()->count(200)->make();
        $data->each(function ($item){
            $likeCond = LikeDislike::where($item->only('movie_id', 'user_id', 'like'));
            $cond = LikeDislike::where($item->only('movie_id', 'user_id'));
            $dislikeCond = LikeDislike::where($item->only('movie_id', 'user_id', 'dislike'));
            $isFavouriteCond = LikeDislike::where($item->only('movie_id', 'user_id', 'is_favourite'));
            if ($cond->count() > 0){
                if($likeCond->count() > 0){
                    $like = $likeCond->first();
                    if($isFavouriteCond->count() == 0){
                        $like->update($item->only(['is_favourite']));
                    }
                }
                else if($dislikeCond->count() > 0){
                    $dislike = $dislikeCond->first();
                    if($isFavouriteCond->count() == 0){
                        $dislike->update($item->only(['is_favourite']));
                    }
                }
            }
            else{
                LikeDislike::firstOrCreate($item->only('movie_id', 'user_id', 'like', 'dislike'));
            }
        });
    }
}
