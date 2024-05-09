<?php

namespace App\Events;

use App\Models\WatchHistory;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WatchHistoryEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct($movie_id)
    {
        //add data in watch history
        if (authCheckByToken()){
            $data = [
                'movie_id'=> $movie_id,
                'user_id' => userIdByToken()
            ];
            WatchHistory::updateOrCreate($data, [
                'updated_at' => Carbon::now()
            ]);
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
//            new PrivateChannel('channel-name'),
        ];
    }
}
