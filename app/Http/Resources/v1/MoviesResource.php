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
        $data =   [
            'slug' => $this->slug,
            'name' => $this->name,
            'play_mode' => $this->play_mode,
            'rating' => $this->rating,
            'thumbnail' => $this->thumbnail,
        ];

        if (authCheckByToken()){
            $data['like_dislike'] = LikeDislikeResource::make($this->like_dislike?->first());
        }
        return $data;
    }
}
