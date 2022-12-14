<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\ResturantCategroy;
use App\Models\Scopes\ActiveScop;
use Illuminate\Http\Request;

class ResturantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ResturantCategroy::paginate(10);

        return view("admin.resturant" , compact("categories"));
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

        ResturantCategroy::create($attributes);

        return redirect("/admin/resturant");
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
                
        ResturantCategroy::find($id)->update($attributes);

        return redirect("/admin/resturant");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        ResturantCategroy::destroy($id);

        return redirect("/admin/resturant");
    }
}
