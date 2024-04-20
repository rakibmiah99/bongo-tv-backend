<?php

namespace App\Models;

use App\Observers\MovieSeasonObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([MovieSeasonObserver::class])]
class MovieSeason extends Model
{
    use HasFactory;

    function episodes(){
        return $this->hasManyThrough(
            Movie::class,
            MovieSeries::class,
            'movie_season_id',
            'id',
        );
    }
}
