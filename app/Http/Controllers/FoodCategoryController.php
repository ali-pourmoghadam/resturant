<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $categories = FoodCategory::paginate(10);

        return view('admin.food' , compact("categories"));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
    
        $attributes = $request->validated();

        FoodCategory::create($attributes);

        return redirect("/admin/food");
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

        $attributes = $request->validated();
                
        FoodCategory::where("id" , $id)->update($attributes);

        return redirect("/admin/food");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        FoodCategory::where("id" , $id)->delete();

        return redirect("/admin/food");

    }


}
