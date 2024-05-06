<?php

namespace App\Models;

use App\Observers\CelebrityProfileObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[ObservedBy(CelebrityProfileObserver::class)]
class CelebrityProfile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    function getImageAttribute(): string{
        return $this->getFirstMedia()?->original_url ?? '';
    }
}
