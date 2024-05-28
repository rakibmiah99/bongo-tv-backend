<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Movies\StoreMovieRequest;
use App\Http\Requests\Admin\Movies\UpdateMovieRequest;
use App\Http\Resources\Admin\MovieResource;
use App\Message;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $text = $request->text;
        $column = $request->type ?? "all";
        $movies = Movie::query();
        if ($text && $column == 'all'){
            $movies = $movies->where('name', 'like', '%'.$text."%");
        }

        $movies = MovieResource::collection($movies->paginate(10))->resource;
        return $this->adminResponse(Message::FETCH(), $movies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
