<?php

namespace App\Http\Controllers\v1;

use App\Events\WatchHistoryEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\MovieDetailsResource;
use App\Http\Resources\v1\SeasonWiseMovieResource;
use App\Models\Movie;
use App\Models\MovieSeason;

class MovieController extends Controller
{
    public function details($slug){
        $movie = Movie::where('slug', $slug)
            ->with([
                'like_dislike',
                'celebrities',
                'film_industry',
                'categories',
                'sub_categories'
            ])
            ->first();

        if (!$movie){

        }

        WatchHistoryEvent::dispatch($movie->id);
        return MovieDetailsResource::make($movie);

    }


    public function seasonWiseMovie($slug){
        $season = MovieSeason::where('slug', $slug)->firstOrFail();
        return SeasonWiseMovieResource::make($season);
    }
}
