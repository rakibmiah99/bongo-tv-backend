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


    public function index(Request $request) {
        $data = Category::select('id','slug', 'name');
        $limit = $request->input('limit', 5);
        $skip = $request->input('skip', 0);
        $data = $data->with([
            'sub_categories:id,category_id,slug,name',
            'slider_movies',
            'sub_categories' => function($sub_categories) use($limit, $skip){
                $sub_categories->limit($limit)->skip($skip)->orderBy('ordering', 'asc')->with([
                    'movies' => function($movies){
                        return $movies->with('movie')->limit(5)->skip(0);
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
