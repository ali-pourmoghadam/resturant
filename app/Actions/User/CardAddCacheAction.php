<?php

namespace App\Actions\User;

use App\Models\Product;
use App\Models\Resturant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CardAddCacheAction {

    public function execute(string $items)
    {

        $key = "card#".Auth::id();

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
}