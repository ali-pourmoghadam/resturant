<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminOrderFilterRequest;
use App\Services\Admin\AdminReportService;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{
    
    public function __construct(AdminReportService $reportService)
    {
        $this->reportService = $reportService;
    }


    public function reportAll (AdminOrderFilterRequest $request)
    {


       $orders =   ($request->has('orderNumber')) ?
        
       $this->reportService->orderFilter($request->input('orderNumber')) :  $this->reportService->orders();

       return view("admin.report" , compact("orders"));
        
    }
}
