<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieSeries extends Model
{
    use HasFactory;

    public function season(){
        return $this->belongsTo(MovieSeason::class, 'movie_season_id', 'id');
    }
}
