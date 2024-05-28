<?php

namespace App\Http\Resources\v1;

use App\Models\PlayListMovie;
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
        $in_playlist  =  PlayListMovie::where('movie_id', $this->id)->whereRelation('play_list', 'user_id', '=', userIdByToken());

        $data = [
            'id' => sshEncrypt($this->id),
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
            'like_dislike' => LikeDislikeResource::make($this->like_dislike?->first()),
            'categories' => CategoryResource::collection($this->categories),
            'sub_categories' => SubCategoryResourceWithOutMovies::collection($this->sub_categories),
            'film_industry' => FilmIndustryResource::make($this->film_industry),
            'in_playlist' => $in_playlist->count(),
            'seasons' => $this->movies_seasons,
            'celebrities' => CelebrityProfileResource::collection($this->celebrities),
            'generics' => GenericsResource::collection($this->generics),
//            'season_movies' => MoviesResource::collection($this->active_season_movies),
            'episodes' => MoviesResource::collection($this->active_season_movies) ?? MoviesResource::collection($this->series_movies )
        ];

        return $data;
    }
}
