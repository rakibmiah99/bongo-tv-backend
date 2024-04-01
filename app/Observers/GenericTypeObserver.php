<?php

namespace App\Observers;

use App\Models\GenericType;
use Illuminate\Support\Str;

class GenericTypeObserver
{
    public function creating(GenericType $genericType): void{
        $genericType->slug = Str::slug($genericType->name);
    }
    /**
     * Handle the GenericType "created" event.
     */
    public function created(GenericType $genericType): void
    {
        //
    }

    /**
     * Handle the GenericType "updated" event.
     */
    public function updated(GenericType $genericType): void
    {
        //
    }

    /**
     * Handle the GenericType "deleted" event.
     */
    public function deleted(GenericType $genericType): void
    {
        //
    }

    /**
     * Handle the GenericType "restored" event.
     */
    public function restored(GenericType $genericType): void
    {
        //
    }

    /**
     * Handle the GenericType "force deleted" event.
     */
    public function forceDeleted(GenericType $genericType): void
    {
        //
    }
}
