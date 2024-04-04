<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MoviesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $movie = $this->movie;
        $data =   [
            'slug' => $movie->slug,
            'name' => $movie->name,
            'play_mode' => $movie->play_mode,
            'rating' => $movie->rating,
            'thumbnail' => $movie->thumbnail,
        ];

        if ($auth = true){
            $data['like_dislike'] = LikeDislikeResource::make($movie->like_dislike?->first());
        }
        return $data;
    }
}
