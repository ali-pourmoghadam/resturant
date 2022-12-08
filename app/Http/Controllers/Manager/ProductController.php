<?php

namespace App\Http\Controllers\Manager;

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
    public function index()
    {
    
        $menus = Auth::guard("manager")->user()
                                        ->menus
                                        ->filter(fn($menu)=> $menu->status == true);

        $products = $this->getProducts($menus);
            
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
     
         $request->validated() ;

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


    public function getProducts($menus)
    {
        $products = [];

        $menus->each(function($menu) use(&$products) {

        $menu->product->each(function($product) use(&$products) {

                $products[] = $product;

            });

          });

        return $products;
    }
}
