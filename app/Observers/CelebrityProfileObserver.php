<?php

namespace App\Observers;

use App\Models\CelebrityProfile;
use Illuminate\Support\Str;

class CelebrityProfileObserver
{
    public function creating(CelebrityProfile $celebrityProfile): void{
        $celebrityProfile->slug = Str::slug($celebrityProfile->name);
    }
}
