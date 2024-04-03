<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\HomeResource;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function menu(){
        return Category::select('slug', 'name')->limit(4)->get();
    }


    public function index() {
        $data = Category::select('id','slug', 'name')->with([
            'sub_categories' => function($subCategory){
                $subCategory->select('id', 'category_id', 'slug', 'name')
                ->with(['movies' => function($movies){
                    $movies->with('movie');
                }]);
            },
            'slider_movies' => function($slidersMovies){

            }

        ])->get();
        $menus = $data->select('slug', 'name');

        $data = $data->first();
        $data->menus = $menus;
        $data = HomeResource::make($data);
        return $this->sendResponse(200, '', $data);
        return $data;
        return $data->merge(['menus' => $menus])->sortDesc();

    }
}
