<?php

namespace App\Actions\Manager;

use App\Models\Resturant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HoursCheckAction {

    public function execute(array $start ,array $end)
    {
       
        $errors = [];

        foreach($start as $key => $value)
        {

            $start[$key] = Carbon::create()->hour($start[$key])->format("H:i");

            $end[$key] = Carbon::create()->hour($end[$key])->format("H:i");

            if($start[$key] >= $end[$key])
            {
                $errors[$key] = "ساعت شروع نمیتواند از ساعت پایان کوچکتر باشد";
            } 

            
        }
        return $errors;
    }
}
