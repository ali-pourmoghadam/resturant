<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerLoginRequest;
use App\Http\Requests\ResturantCreateRequest;
use App\Models\City;
use App\Models\Manager;
use App\Models\Resturant;
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

        $categories = ResturantCategroy::where("status" , 1)->get();    

        return  view('manager.register', compact("cities" , "categories"));
    }
    


    public function managerStore(ResturantCreateRequest $request)
    {
        
       $attributes = $request->validated();
       


       $manager = Manager::create([

            "email" => $attributes['email'] ,

            'password' => bcrypt($attributes['password'])

       ]);

       Resturant::create([

            "manager_id" => $manager->id ,

            "city_id" => $attributes['city'] ,

            "rsturant_category" => $attributes['type']

       ]);



        Auth::guard("manager")->login($manager);
        

        return response()->json(['success' => true]);
    }


    public function managerLogin()
    {
        return  view('manager.login');
    }

    
    public function managerAuth(ManagerLoginRequest $request)
    {
        
        $attributes = $request->validated();


        $login = Auth::guard('manager')->attempt([ "email" =>  $attributes['email'] , "password" => $attributes['password']] ,  $attributes['remmember'] );

        
        if(!$login)
         {
            return response()->json(["errors" => ['wrong_credential' => "ایمیل یا پسسورد اشتباه است"]]);
         }


        return response()->json(["success" => true]);

    }
    




    public function logout(String $guard)
    {

        FacadesSession::flush();

        Auth::guard($guard)->logout();

        return redirect("/");

    }
    
}
