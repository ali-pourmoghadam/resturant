<?php
namespace App\Actions\User;

use App\Http\Resources\MenueResource;
use App\Http\Resources\ResturantCardResource;
use App\Models\Product;
use App\Models\Resturant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CardGetCacheAction {

    public function execute()
    {

       return $this->foodByResturant()

             ->map(function($foods , $key){
                
              return [

                "id" => $key , 

                "resturant" => new ResturantCardResource(Resturant::find($key)) ,

                "foods" => $foods

              ];

             });
        
    }



    private function foodByResturant()
    {
        $items = Cache::get("card#".Auth::id());
        
        if(is_null($items)) return false;

        $products = Product::whereIn("id" , array_keys($items))->get();

        $resturants = $products->groupBy(fn($data) => $data->menu[0]->resturant->id);
        
       
        $res = $resturants->map(function($resturant) use(&$items){

            $result =[];
          
            $resturant->each( function($product) use($items ,&$result){

                $result[] = [

                        "title" => $product->name ,

                        "id" => $product->id , 

                        "count" =>  $items[$product->id] ,

                        "price" => $product->price *  $items[$product->id] 
                        
                ];
    
            });

            return $result;

        });

        return $res;
    }
}