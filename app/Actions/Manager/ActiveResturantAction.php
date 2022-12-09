<?php

namespace App\Actions\Manager;

use App\Models\Resturant;
use Illuminate\Support\Facades\Auth;

class ActiveResturantAction {

    public function execute()
    {

       return Auth::guard("manager")->user()->resturants[0];
    }
}
