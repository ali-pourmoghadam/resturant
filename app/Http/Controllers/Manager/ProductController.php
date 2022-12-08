<?php

namespace App\Http\Controllers\Manager;

use App\Actions\Manager\MenuAction;
use App\Actions\Manager\ProductAction;
use App\Http\Controllers\Controller;
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
    public function index(MenuAction $menus ,ProductAction $product)
    {
    
        $menus = $menus->execute();

        $products = $product->execute($menus);
            
        $foodCategories = FoodCategory::all();                                

        return view("manager.product" , compact("products" , "menus" , "foodCategories"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
    
         $attributes  = $request->except("menu" , "thumbnail");

         $attributes['img'] = $request->file("thumbnail")->store("products");

         $product =  Product::create($attributes);

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
    public function update(ProductRequest $request, $id)
    {

        $attributes = $request->validated() ;

        Product::find($id)->update($attributes);
        
        return redirect("/manager/product");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product =  Product::find($id);

        $product->menu->each(function($menu) use ($product){
            
            $menu->product()->detach($product->id);

        });    

        $product->delete();

        return redirect("/manager/product");
    }

}
