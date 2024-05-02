<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryWithOutMoviesResource;
use App\Http\Resources\v1\CategoryPageResource;
use App\Http\Resources\v1\CategoryResource;
use App\Http\Resources\v1\HomeResource;
use App\Http\Resources\v1\MovieResource;
use App\Http\Resources\v1\SubCategoryResource;
use App\Http\Resources\v1\SubCategoryResourceWithOutMovies;
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

        return $this->sendResponse(200, '', $data);

    }

    public function subCategoryMovies($categoryName,$subCategoryName){
        $limit = \request()->input('limit', 15);
        $skip = \request()->input('skip', 0);
        $category =  Category::where('slug', $categoryName)->firstOrFail();
        $sub_categories = $category->sub_categories->where('slug', $subCategoryName)->firstOrFail();
        $movies = $sub_categories->load(['sub_categories_movies' => function($movies) use($limit, $skip){
            $movies->limit($limit)->skip($skip);
        }])->sub_categories_movies;

        $data =  [
            'category' => CategoryResource::make($category),
            'sub_category' => SubCategoryResourceWithOutMovies::make($sub_categories),
            'movies' => MovieResource::make($movies)
        ];

        return $this->sendResponse(200, '', $data);
    }
}
