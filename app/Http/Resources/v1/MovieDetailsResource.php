<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
//            'film_industry_id' => $this->film_industry_id,
            'slug' => $this->slug,
            'name' => $this->name,
            'description' => $this->description,
            'play_mode' => $this->play_mode,
            'rating' => $this->rating,
            'visibility' => $this->visibility,
            'trailer_youtube_link' => $this->trailer_youtube_link,
            'video_path' => $this->video_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'like_dislike' => $this->like_dislike,
            'categories' => CategoryResource::collection($this->categories),
            'sub_categories' => SubCategoryResourceWithOutMovies::collection($this->sub_categories),
            'film_industry' => FilmIndustryResource::make($this->film_industry),
            'celebrities' => CelebrityProfileResource::collection($this->celebrities),
            'seasons' => $this->seasons,
            'episodes' => $this->series
        ];

        return $data;
    }
}
