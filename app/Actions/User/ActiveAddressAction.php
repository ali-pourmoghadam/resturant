<?php

namespace App\Actions\User;

use App\Models\Address;
use App\Models\Resturant;
use Illuminate\Support\Facades\Auth;

class ActiveAddressAction {

    public function execute($request , $address)
    {
      
     if($request->method() == "PATCH"){

            
        $all = Address::where( "user_id" , Auth::id());
        
        $all->update(["is_active" => false]);
        
        $address->is_active = true ;
        
        $address->save();
        
        
        }

    }
}



