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
            'movie_id',
            'id',
            'id',
            'celebrity_profile_id'
        );
    }


    public function generics(){
        return $this->hasManyThrough(
          GenericType::class,
          MoviesGeneric::class,
          'movie_id',
          'id',
            'id',
        'generic_type_id'
        );
    }



    function series_parent(){
        return $this->belongsTo(MovieSeries::class, 'id', 'movie_id')
            ->whereNull('movie_season_id')->select('series_movie_id');
    }


    function seasons(){
        return $this->hasMany(MovieSeason::class, 'movie_id', 'id');
    }

    function seasons_parent(){
        return $this->belongsTo(MovieSeries::class, 'id', 'movie_id')
            ->whereNull('series_movie_id')
            ->with('season')
            ->select('movie_season_id');
    }

    function getMoviesSeasonsAttribute(){
        if($this->seasons->count()){
           return $this->seasons->map(function ($season){
               $season['is_active'] = false;
               return $season;
           });
        }
        else{
            $parent = $this->seasons_parent;
            return MovieSeason::where('movie_id', $parent?->season?->movie_id)->get()->map(function ($session) use($parent){
                $active = $session->id == $parent->movie_season_id;
                $session['is_active'] = $active;
//                $session['episodes'] = $active ? $session?->first()?->episodes ?? [] : [];
                return $session;
            });
        }
    }


    function getActiveSeasonMoviesAttribute(){
        $movies_season = $this->movies_seasons;
        if ($movies_season->where('is_active', true)->count() > 0){
            return $movies_season->where('is_active', true)?->first()?->episodes ?? [];
        }
        else{
            return $movies_season?->first()?->episodes ?? [];
        }
    }


    function getSeriesMoviesAttribute () {
        $movies = MovieSeries::where('series_movie_id', $this?->series_parent?->series_movie_id ?? $this->id)->pluck('movie_id');
        return Movie::whereIn('id', $movies)->get();
    }



}
