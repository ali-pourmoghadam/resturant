<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('admin')->except('login');

    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
    public function resturant()
    {
        
        return view('admin.resturant');

    }

    public function food()
    {
        return view('admin.food');
    }


}
