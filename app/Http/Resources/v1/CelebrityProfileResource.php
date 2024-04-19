<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CelebrityProfileResource extends JsonResource
{
    protected static $is_details = true;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $this->image,
        ];

        if (self::$is_details){
            $data['description'] = $this->description;
        }

        return $data;
    }

    public static function collection($resource)
    {
        self::$is_details = false;
        return parent::collection($resource); // TODO: Change the autogenerated stub
    }
}
