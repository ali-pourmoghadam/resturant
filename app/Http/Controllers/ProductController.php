<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\FoodCategory;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Scopes\ActiveScop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products= Product::withoutGlobalScope(ActiveScop::class)->paginate(10);


        $menus = Auth::guard("manager")->user()
                                        ->menus
                                        ->filter(fn($menu)=> $menu->status == true);


        $foodCategories = FoodCategory::all();                                


        return view("manager.product" , compact("products" , "menus" , "foodCategories"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
         $request->validated() ;

         $product =  Product::create($request->except("menu"));

         $product->menu()->attach($request->input("menu"));
         
         return redirect("/manager/product");
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
