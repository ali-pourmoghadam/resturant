<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResturantCreateRequest;
use App\Models\City;
use App\Models\ResturantCategroy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

  /**  ADMIN SECTION AUTH **/

    
    public function adminlogin()
    {
        
        return view('admin.login');
    }
    


    public function adminAuth()
    {

        $creadential = request()->validate(
            [
                "email" => "required|email" , 

                "password" => "required"
            ]
        );


        if(!Auth::guard("admin")->attempt($creadential))
        {
            throw  ValidationException::withMessages(["error" => "نام کاربری یا رمز عبور اشتباه است"]);
        }

        FacadesSession::put("id" ,  Auth::guard("admin")->user());


        return redirect("/admin/dashboard");
    }




    /**  MANAGER SECTION AUTH **/



    public function managerRegister()
    {
        
        // !notice :  city and category will loads with ActiveScop

        $cities = City::all();    

        $categories = ResturantCategroy::all();    


        return  view('manager.register', compact("cities" , "categories"));
    }
    


    public function managerStore(ResturantCreateRequest $request)
    {
        
       $request->validated();
       

        return response()->json(['success' => true]);
    }


    public function managerLogin()
    {
        return  view('manager.login');
    }

    
    public function managerAuth()
    {
        //manager auth
    }
    




    public function logout(String $guard)
    {

        FacadesSession::flush();

        Auth::guard($guard)->logout();

        return redirect("/");

    }
    
}
