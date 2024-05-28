<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\FavouriteMovieResource;
use App\Http\Resources\v1\MoviesResource;
use App\Models\LikeDislike;
use App\Models\Movie;
use App\Models\PlayList;
use App\Models\PlayListMovie;
use App\Models\WatchHistory;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AccountController extends Controller
{

    function getFavourite(){
        $movies = LikeDislike::User()
            ->where('is_favourite', true)
            ->with('movie')
            ->paginate(3);
        $data =  FavouriteMovieResource::collection($movies)->resource;
        return $this->sendResponse(200, '', $data);
    }

    function getLikes(){
        $movies = LikeDislike::User()
            ->where('like', true)
            ->with('movie')
            ->paginate(3);
        $data =  FavouriteMovieResource::collection($movies)->resource;
        return $this->sendResponse(200, '', $data);
    }
    function getPlayList(){
        $movies = PlayListMovie::User()
            ->with('movie')
            ->paginate(3);

        $data =  FavouriteMovieResource::collection($movies)->resource;
        return $this->sendResponse(200, '', $data);
    }


    function getWatchHistories(){
        $movies = WatchHistory::User()
            ->with('movie')
            ->paginate(3);

        $data =  FavouriteMovieResource::collection($movies)->resource;
        return $this->sendResponse(200, '', $data);
    }

    function actionFavourite(Request $request){
        $content_id = sshDecrypt($request->content_id);
        $action = $request->action;
        if ($content_id){
            $data = LikeDislike::firstOrNew([
               'user_id' => userId(),
               'movie_id' => $content_id
            ]);

            if ($action === 'favourite'){
                $data->is_favourite =  !$data->is_favourite;
            }
            else if($action === 'like'){
                $data->like =  !$data->like;
                if ($data->like){
                    $data->dislike = 0;
                }
            }
            else if ($action === 'dislike'){
                $data->dislike =  !$data->dislike;
                if ($data->dislike){
                    $data->like = 0;
                }
            }
            $data->save();
            if (!$data->like && !$data->dislike && !$data->is_favourite){
                $data->delete();
            }
            $data =  FavouriteMovieResource::make($data);
            return $this->sendResponse(200, '', $data);
        }
    }

    function addOrRemoveToLibrary(Request $request){
        try{
            $playList = PlayList::firstOrCreate([
                'user_id' =>  userId()
            ],
                [
                    'name' => 'default'
                ]
            );

            $movie_id = sshDecrypt($request->content_id);
            if(!$movie_id){

            }
            $playListMovieData = ['movie_id' => $movie_id, 'play_list_id' =>  $playList->id];
            $hasData = PlayListMovie::where($playListMovieData)->count();

            if ($hasData){
                PlayListMovie::where($playListMovieData)->delete();
                return $this->sendResponse(200, 'removed from library', [
                   'in_playlist' => false,
                ]);
            }
            else{
                PlayListMovie::insert($playListMovieData);
                return $this->sendResponse(200, 'added successfully', [
                    'in_playlist' => true,
                ]);
            }
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
