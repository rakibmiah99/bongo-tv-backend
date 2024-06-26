<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    use HasFactory;
    protected $guarded = [];

    function scopeUser(Builder $builder){
        $builder->where('user_id', userId());
    }
    function movie(){
       return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}
