<?php

namespace App\Observers;

use App\Models\Movie;
use Illuminate\Support\Str;

class MovieObserver
{
    function creating(Movie $movie){
        $movie->slug = Str::slug($movie->name);
    }
}
