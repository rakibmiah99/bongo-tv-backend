<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    use HasFactory;

    function scopeUser(Builder $builder){
        $builder->where('user_id', userId());
    }

    function movies(){
//        return $this->hasMany(PlayListMovie::class, 'play_list_id', 'id');

        return $this->hasManyThrough(
        Movie::class,
               PlayListMovie::class,
            'play_list_id',
            'id'
        );
    }
}
