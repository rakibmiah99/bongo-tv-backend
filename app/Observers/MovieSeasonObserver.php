<?php

namespace App\Observers;

use App\Models\MovieSeason;
use Illuminate\Support\Str;

class MovieSeasonObserver
{
    /**
     * Handle the MovieSeason "creating" event.
     */
    public function creating(MovieSeason $movieSeason): void
    {
        $movieSeason->slug = Str::slug($movieSeason->name);
    }
    /**
     * Handle the MovieSeason "created" event.
     */
    public function created(MovieSeason $movieSeason): void
    {
        //
    }

    /**
     * Handle the MovieSeason "updated" event.
     */
    public function updated(MovieSeason $movieSeason): void
    {
        //
    }

    /**
     * Handle the MovieSeason "deleted" event.
     */
    public function deleted(MovieSeason $movieSeason): void
    {
        //
    }

    /**
     * Handle the MovieSeason "restored" event.
     */
    public function restored(MovieSeason $movieSeason): void
    {
        //
    }

    /**
     * Handle the MovieSeason "force deleted" event.
     */
    public function forceDeleted(MovieSeason $movieSeason): void
    {
        //
    }
}
