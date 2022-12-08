<?php

namespace App\Actions\Manager;

use App\Models\Resturant;


class BinaryDaysAction {

    public function execute($request , $helper)
    {

        $days  = $request->except('_token' , "name" , "status" , "_method");
        
        return $helper->encodeBinaryDays($days);
    }
}
