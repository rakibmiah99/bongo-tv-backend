<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if (!$request->has('limit') || !$request->has('skip')){
            $data['slider_movies'] = CategorySliderMoviesResource::collection($this->slider_movies);
        }
        $data['category'] = [
            'name' => $this->name,
            'slug' => $this->slug
        ];
        $data['sub_category_and_movies'] = SubCategoryResource::collection($this->sub_categories);

        return $data;
    }
}
