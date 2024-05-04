<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\MovieDetailsResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function details($slug){
//        return Movie::where('slug', $slug)->first()->seasons_parent;
//        return Movie::where('slug', $slug)->first()->movies_seasons;
//        return Movie::where('slug', $slug)->first()->active_season_movies;

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

        return MovieDetailsResource::make($movie);

    }
}
