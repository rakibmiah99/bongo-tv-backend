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
        return  [
            'slug' => $movie->slug,
            'name' => $movie->name,
            'play_mode' => $movie->play_mode,
            'rating' => $movie->rating,
            'thumbnail' => $movie->thumbnail
        ];
    }
}
