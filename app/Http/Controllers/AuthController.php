<?php

namespace App\Http\Controllers;

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

            throw  ValidationException::withMessages([
                "error" => "نام کاربری یا رمز عبور اشتباه است"
            ]);

        }

        FacadesSession::put("id" ,  Auth::guard("admin")->user());


        return redirect("/admin/dashboard");
    }




    /**  MANAGER SECTION AUTH **/



    public function managerRegister()
    {
        return "register";
    }
    


    public function managerStore()
    {
        // create manager
    }


    public function managerLogin()
    {
        return "login";
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
