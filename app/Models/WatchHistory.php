<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchHistory extends Model
{
    use HasFactory;

    function scopeUser(Builder $builder){
        $builder->where('user_id', userId());
    }

    function movie(){
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }


}
