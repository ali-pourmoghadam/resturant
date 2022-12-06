<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportOrderFilterRequest;
use App\Services\Manager\ManagerReportService;
use Illuminate\Http\Request;

class ManagerOrderReportController extends Controller
{


    public function reportAll(ReportOrderFilterRequest $request ,ManagerReportService $report)
    {
  
        $orders =   ($request->has('orderNumber')) ?
        
        $report->reportFilterOrder($request->input('orderNumber')) :  $report->reportCompletedOrders() ;

        $income = $report->reportIncomeOrder();

        $count  = $report->reportCoutnOrder();

        return view("manager.report" , compact("orders" , "income" , "count"));
    }

}
