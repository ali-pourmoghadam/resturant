<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    
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

    


    public function logout(String $guard)
    {

        FacadesSession::flush();

        Auth::guard($guard)->logout();

        return redirect("/");

    }
    
}
