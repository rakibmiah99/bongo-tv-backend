<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    public static bool $is_collection = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'visibility' => $this->visibility
        ];

        if (self::$is_collection) {
            return $data;
        } else {
            return $data;
        }
    }



    public static function collection($resource)
    {
        self::$is_collection = true;
        return parent::collection($resource); // TODO: Change the autogenerated stub
    }
}
