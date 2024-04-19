<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayListMovie extends Model
{
    use HasFactory;

    function scopeUser(Builder $builder){
        $builder->whereRelation('play_list', 'user_id', '=', userId());
    }

    function play_list(){
        return $this->belongsTo(PlayList::class, 'play_list_id', 'id');
    }

    function movie(){
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}
