<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'category' => [
                'name' => $this->name,
                'slug' => $this->slug
            ],
            'slider_movies' => CategorySliderMoviesResource::collection($this->slider_movies),
            'sub_category_and_movies' => SubCategoryResource::collection($this->sub_categories)

        ];
    }
}
