<?php

namespace App\Actions\User;

use App\Models\Resturant;


class ResturantFoodAction {

    public function execute(Resturant $resturant)
    {
        $menues = $resturant->menues->each(fn($menu) => $menu);

        $products = [];

        $menues->each(function($menu) use(&$products){

            $menu->product->each(function($product) use(&$products){

                $products[] = $product;

                });   
          
        });

       return collect($products)->groupBy("category");

    }
}