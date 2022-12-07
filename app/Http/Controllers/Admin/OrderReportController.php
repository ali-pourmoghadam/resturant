<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{
    
    public function reportAll ()
    {
        return view("admin.report");
    }
}
