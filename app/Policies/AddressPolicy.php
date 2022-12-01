<?php

namespace App\Policies;

use App\Actions\User\AllowAccRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AddressPolicy
{

    use HandlesAuthorization;

    
    public function accessAdress(User $user , $reciveId)
    {
       return ($reciveId == $user->id) ? true : false;
    }

  
}
