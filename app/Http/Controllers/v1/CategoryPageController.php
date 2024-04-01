<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CategoryPageResource;
use App\Http\Resources\v1\HomeResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function index($categoryName) {
        $data = Category::where('slug', $categoryName)->select('id','slug', 'name')->with([
            'sub_categories' => function($subCategory){
                $subCategory->select('id', 'category_id', 'slug', 'name')
                    ->with(['movies' => function($movies){
                        $movies->with('movie');
                    }]);
            },
            'slider_movies' => function($slidersMovies){

            }

        ])->first();
        $data = CategoryPageResource::make($data);

        return $data;
        return $data->merge(['menus' => $menus])->sortDesc();

    }
}
