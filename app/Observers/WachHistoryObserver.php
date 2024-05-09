<?php

namespace App\Observers;

use App\Models\WatchHistory;

class WachHistoryObserver
{
    /**
     * Handle the WachHistory "created" event.
     */
    public function created(WatchHistory $watchHistory): void
    {
        //
    }

    /**
     * Handle the WachHistory "updated" event.
     */
    public function updated(WatchHistory $watchHistory): void
    {

    }

    /**
     * Handle the WachHistory "deleted" event.
     */
    public function deleted(WatchHistory $watchHistory): void
    {
        //
    }

    /**
     * Handle the WachHistory "restored" event.
     */
    public function restored(WatchHistory $watchHistory): void
    {
        //
    }

    /**
     * Handle the WachHistory "force deleted" event.
     */
    public function forceDeleted(WatchHistory $watchHistory): void
    {
        //
    }
}
