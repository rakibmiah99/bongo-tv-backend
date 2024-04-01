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


    function getThumbnailAttribute(): string{
        return $this->getFirstMedia(self::W9XH16)?->original_url ?? '';
    }
    function getCoverAttribute(): string{
        return $this->getFirstMedia(self::W16XH9)?->original_url ?? '';
    }
}
