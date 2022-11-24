<?php

namespace App\Actions\User;

use App\Models\Product;
use App\Models\Resturant;


class ProductExistsAction {

    public function execute(array $items)
    {
      
        $items = json_decode($items["items"]);

        $data = Product::whereIn("id" ,  $items)->get();

        return count($items) == $data->count() ?? false; 
    }
}