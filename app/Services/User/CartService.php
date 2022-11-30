<?php


namespace App\Services\User;

use App\Http\Resources\ResturantCardResource;
use App\Models\Product;
use App\Models\Resturant;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CartService{


    public function readCache()
    {
            $items = Cache::get("cart#".Auth::id());
            
            if(is_null($items)) return false;
    
            return [Product::whereIn("id" , array_keys($items))->get() , $items];
    }



    public function readCacheAll()
    {

      $cache = $this->readCache();

      if(empty($cache[1])) return false;

       return $this->readFoodByResturant($cache[0] , $cache[1])->map(function($foods , $key){

              return [

                "resturant" => new ResturantCardResource(Resturant::find($key)) ,

                "foods" => $foods

              ];

             });
        
    }



    public function writeCacheCart(string $items)
    {

        $key = "cart#".Auth::id();

        $items = json_decode($items);

        if(!Cache::has($key)) 
        
        return Cache::put($key , array_fill_keys($items , 1) , now()->addDay()) ;
        
        $cacheItems = Cache::get($key);

        foreach($items as $item)
        {
            
            if(array_key_exists($item , $cacheItems)) 
            {
                $cacheItems[$item] ++;

                continue;
            }

            $cacheItems[$item] = 1;
        }

        return  Cache::put($key ,$cacheItems);
               
    }




    public function deleteCacheCart(string $items)
    {

       $cache =  $this->readCache();

       $items = json_decode($items);

       if($item = $this->checkForDelete($items ,$cache) != true)
       {
            return $item." dosnt exists in card";
       }

       foreach($items as $item)
       {
   
           if(array_key_exists($item , $cache[1])) 
           {

                if ($cache[1][$item] == 1){

                    unset($cache[1][$item]);

                    continue;
                }

                $cache[1][$item] --;
           }
       }

      
       Cache::put("cart#".Auth::id() , $cache[1]);

       return "deleted successfully";
    }


    public function deleteCacheAll()
    {
        return Cache::forget("cart#".Auth::id());
    }

  
    private function readFoodByResturant(Collection $products , array $items)
    {

        $resturants = $products->groupBy(fn($data) =>$data->menu[0]->resturant->id);
        
        $allResturantFoods = $resturants->map(function($resturant) use(&$items){

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

        return $allResturantFoods;
    }



    public function productsExist($items){
        
        $items = json_decode($items["items"]);

        $data = Product::whereIn("id" ,  $items)->get();

        return count($items) == $data->count() ?? false; 
    }


    
    public function cartExist(int $id)
    {
        return Cache::has("cart#".$id)  ;
    }




    public function checkForDelete(array $items , $cache)
    {
        foreach($items as $item)
        {
            if(! array_key_exists($item , $cache[1])) return $item;
        }

        return true;
    }




}