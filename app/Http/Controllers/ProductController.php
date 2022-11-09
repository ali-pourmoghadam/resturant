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
    
        $menus = Auth::guard("manager")->user()
                                        ->menus
                                        ->filter(fn($menu)=> $menu->status == true);

        $products = [];

        $menus->each(function($menu) use(&$products) {

        $menu->product->each(function($product) use(&$products) {

                $products[] = $product;

            });

          });
            

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

         $path =  $request->file("thumbnail")->store("products");

         $attributes  = $request->except("menu" , "thumbnail");

         $attributes['img'] = $path;

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

        Product::where("id" , $id)->update($attributes);
        
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

        $product =  Product::where("id" , $id)->first();

        $product->menu->each(function($menu) use ($product){
            
            $menu->product()->detach($product->id);

        });    

        $product->delete();

        return redirect("/manager/product");
    }
}
