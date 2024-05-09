<?php

namespace App\Models;

use App\Observers\WachHistoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(WachHistoryObserver::class)]
class WatchHistory extends Model
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
