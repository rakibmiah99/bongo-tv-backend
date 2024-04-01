<?php

namespace App\Models;

use App\Observers\FilmIndustryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy(FilmIndustryObserver::class)]
class FilmIndustry extends Model
{
    use HasFactory;
}
