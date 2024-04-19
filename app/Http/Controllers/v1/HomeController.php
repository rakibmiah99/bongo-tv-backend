<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\HomeResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class HomeController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
//            'auth:sanctum'
        ];
        // TODO: Implement middleware() method.
    }

    public function menu(){
        return Category::select('slug', 'name')->limit(4)->get();
    }


    public function index() {
        $data = Category::select('id','slug', 'name')->with([
            'sub_categories:id,category_id,slug,name',
            'slider_movies',
            'sub_categories' => function($sub_categories){
                $sub_categories->limit(5)->skip(0)->orderBy('ordering', 'asc')->with([
                    'movies' => function($movies){
                        return $movies->with('movie')->limit(10)->skip(0);
                    }
                ]);
            }
        ])->get();
        $menus = $data->select('slug', 'name');

        $data = $data->first();
        $data->menus = $menus;
        $data = HomeResource::make($data);
        return $this->sendResponse(200, '', $data);
    }
}
