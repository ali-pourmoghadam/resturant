<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerLoginRequest;
use App\Http\Requests\ResturantCreateRequest;
use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\Manager;
use App\Models\Resturant;
use App\Models\ResturantCategroy;
use App\Models\User;
use App\Models\WorkHours;
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
        
        // ! Notice :  city  will loads with ActiveScop

        $cities = City::all();    

        $categories = ResturantCategroy::where("status" , 1)->get();    

        return  view('manager.register', compact("cities" , "categories"));
     }
    


      public function managerStore(ResturantCreateRequest $request)
      {
        
       $attributes = $request->validated();
       


       $manager = Manager::create([

            "email" => $attributes['email'] ,

            'password' =>$attributes['password']

        ]);

       $resturant = Resturant::create([

            "manager_id" => $manager->id ,

            "city_id" => $attributes['city'] ,

            "rsturant_category" => $attributes['type']

        ]);


        WorkHours::create(["resturant_id" => $resturant->id]);

        
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
    

       /**  USER SECTION AUTH **/

       public function userRegister(UserRequest $request)
       {

            $attributes =  $request->validated();

            $user = User::create($attributes);

            $token = Auth::guard("api")->login($user);

            return response()->json([

                    "message" => "user created successfully" ,
                    
                    "token" => $token 
            ]);
       }


       public function userAuth(Request $request)
       {        

        $request->validate(
            [
                "email" => "required|email" , 

                "password" => "required"
            ]
        );
        

        $credentials = $request->only('email', 'password');


        $token = Auth::guard("api")->attempt($credentials);

        if (!$token) {

            return response()->json([

                'status' => 'error',

                'message' => 'username or password is wrong',

            ], 401);
        }


        $user = Auth::guard("api")->user();
        

        return response()->json([

                'message' => 'welcome',

                'authorisation' => [

                    'token' => $token,

                    'type' => 'bearer',

                ]
            ]);

       }


       public function logout(String $guard)
       {

        FacadesSession::flush();

        Auth::guard($guard)->logout();

        return redirect("/");

       }
    
}
