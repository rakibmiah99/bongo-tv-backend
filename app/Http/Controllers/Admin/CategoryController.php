<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryCreateRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Http\Resources\Admin\CategoryDetailsResource;
use App\Http\Resources\Admin\CategoryResource;
use App\Message;
use App\Models\Category;
use App\Models\Scopes\OrderingScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::get();
        $data = CategoryResource::collection($data);
        return $this->adminResponse(Message::FETCH(), $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->validated();
        return Category::create($data);
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $this->adminResponse(Message::FETCH(), CategoryDetailsResource::make($category));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return $this->adminResponse(Message::UPDATED(), CategoryResource::make($category));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->adminResponse(Message::UPDATED(), CategoryResource::make($category));
    }

    public function reArrange(Request $request){
        $ids = $request->ids;
        $ordering_data = Category::whereIn('id', $ids)->pluck('ordering')->toArray();
        for ($index = 0; $index < count($ids); $index++){
            $id = $ids[$index];
            try{
                $category = Category::findOrFail($id);
                $category->ordering = $ordering_data[$index];
                $category->save();
            }
            catch (\Exception $exception){
                continue;
            }
        }

        return $this->adminResponse(Message::UPDATED(), CategoryResource::collection(Category::all()));
    }
}
