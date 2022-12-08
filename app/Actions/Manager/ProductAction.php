<?php

namespace App\Actions\Manager;

use Illuminate\Support\Facades\Auth;

class ProductAction {

    public function execute($menus)
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


