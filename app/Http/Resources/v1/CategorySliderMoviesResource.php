<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorySliderMoviesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'play_mode' => $this->play_mode,
            'rating' => $this->rating,
            'cover' => $this->cover,
            'thumbnail' => $this->thumbnail,
            'description' => $this->description
        ];
    }
}
