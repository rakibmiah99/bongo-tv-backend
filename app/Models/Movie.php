<?php

namespace App\Models;

use App\Enums\ImageSize;
use App\Observers\MovieObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[ObservedBy([MovieObserver::class])]
class Movie extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    const W16XH9 = ImageSize::w16xh9->value;
    const W9XH16 = ImageSize::w9xh16->value;
    const W3XH4 = ImageSize::w3xh4->value;
    const W4XH3 = ImageSize::w4xh3->value;
    protected $with = [];

    function getThumbnailAttribute(): string{
        return $this->getFirstMedia(self::W9XH16)?->original_url ?? '';
    }
    function getCoverAttribute(): string{
        return $this->getFirstMedia(self::W16XH9)?->original_url ?? '';
    }

    function like_dislike(){
        return $this->hasMany(LikeDislike::class, 'movie_id', 'id')->where('user_id', userIdByToken());
    }

    function film_industry(){
        return $this->belongsTo(FilmIndustry::class, 'film_industry_id', 'id');
    }
    function categories(){
        return $this->hasManyThrough(
            Category::class,
            MoviesCategory::class,
            'category_id',
            'id'
        );
    }
    function sub_categories(){
        return $this->hasManyThrough(
            SubCategory::class,
            MoviesCategory::class,
            'sub_category_id',
            'id'
        );
    }
    function celebrities(){
        return $this->hasManyThrough(
            CelebrityProfile::class,
            MoviesCelebrity::class,
            'celebrity_profile_id',
            'id'
        );
    }


    //session has multi series
    function seasons(){
        return $this->hasMany(MovieSeason::class, 'movie_id', 'id')->with('episodes');
    }


    //mutipar
    function series(){
        return $this->hasManyThrough(
            Movie::class,
            MovieSeries::class,
            'series_movie_id',
            'id',
            'id',
            'series_movie_id'
        )->whereNull('movie_series.movie_season_id')->select('*');
    }

    function series_parent(){
        return $this->belongsTo(MovieSeries::class, 'id', 'movie_id')
            ->whereNull('movie_season_id')->select('series_movie_id');
    }



    function getSeriesMoviesAttribute () {
        $movies = MovieSeries::where('series_movie_id', $this->series_parent->series_movie_id)->pluck('movie_id');
        return Movie::whereIn('id', $movies)->get();
    }



}
