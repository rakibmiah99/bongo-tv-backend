<?php

namespace App\Observers;

use App\Models\FilmIndustry;
use Illuminate\Support\Str;

class FilmIndustryObserver
{
    public function creating(FilmIndustry $filmIndustry): void{
        $filmIndustry->slug = Str::slug($filmIndustry->name);
    }
}
