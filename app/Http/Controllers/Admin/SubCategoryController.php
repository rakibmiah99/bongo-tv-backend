<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\DestroySubCategoryRequest;
use App\Http\Requests\Admin\SubCategory\StoreSubCategoryRequest;
use App\Http\Requests\Admin\SubCategory\UpdateSubCategoryRequest;
use App\Http\Resources\Admin\CategoryDetailsResource;
use App\Http\Resources\Admin\SubCategoryResource;
use App\Http\Resources\SubCategoryDetailsResource;
use App\Message;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id'
        ]);
        $category_id = $data['category_id'];
        $category = Category::find($category_id);
        return $this->adminResponse(Message::FETCH(), CategoryDetailsResource::make($category));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $data = SubCategory::create($request->validated());
        $data = SubCategoryDetailsResource::make($data);
        return $this->adminResponse(Message::FETCH(), $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $sub_category)
    {
        return $this->adminResponse(Message::FETCH(), SubCategoryDetailsResource::make($sub_category));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $sub_category)
    {
       $data =  $request->validated();
       $sub_category->update($data);
       $sub_category = SubCategoryResource::make($sub_category);
       return $this->adminResponse(Message::UPDATED(), $sub_category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroySubCategoryRequest $request, SubCategory $sub_category)
    {
        $sub_category->delete();
        return $this->adminResponse(Message::DELETED(), SubCategoryResource::make($sub_category));
    }


    public function reArrange(Request $request){
        $ids = $request->ids;
        $category_id = $request->category_id;
        $query = SubCategory::where('category_id', $category_id);
        $ordering_data = $query->whereIn('id', $ids)->pluck('ordering')->toArray();
        for ($index = 0; $index < count($ids); $index++){
            $id = $ids[$index];
            try{
                $category = SubCategory::findOrFail($id);
                $category->ordering = $ordering_data[$index];
                $category->save();
            }
            catch (\Exception $exception){
                continue;
            }
        }


        return $this->adminResponse(Message::UPDATED(), SubCategoryResource::collection($query->get()));
    }
}
