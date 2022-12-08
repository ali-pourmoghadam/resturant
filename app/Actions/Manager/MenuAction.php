<?php

namespace App\Actions\Manager;

use Illuminate\Support\Facades\Auth;

class MenuAction {

    public function execute()
    {

       return  Auth::guard("manager")->user()
                    ->menus
                    ->filter(fn($menu)=> $menu->status == true);
    }
}
