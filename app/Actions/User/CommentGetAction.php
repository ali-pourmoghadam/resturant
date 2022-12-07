<?php

namespace App\Actions\User;

use App\Http\Resources\OrderCommentResource;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Resturant;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CommentGetAction {

    public function execute(array $attribute)
    {


        $orders = (key_exists("food_id" , $attribute)) ? 

        $this->orders("product_id" , $attribute["food_id"]) :  $this->orders("resturant_id" , $attribute["resturant_id"]);

        $orders = $orders->filter(fn($order) =>

        ($order->comment->isEmpty()) ? false : true );

        return OrderCommentResource::collection($orders);

    }


    private function orders($parameter , $attribute)
    {

      return  Order::whereIn("id" , function($query) use($parameter , $attribute){

            $query->select("order_id")
                  ->from("order_product")
                  ->where($parameter  , $attribute);

        })->get();

    }
}