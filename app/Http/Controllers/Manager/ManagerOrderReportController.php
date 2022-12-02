<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportOrderFilterRequest;
use App\Services\Manager\ManagerReportService;
use Illuminate\Http\Request;

class ManagerOrderReportController extends Controller
{


    public function reportAll(ManagerReportService $report)
    {
        $orders = $report->reportCompletedOrders();

        return view("manager.report" , compact("orders"));
    }


    public function orderBy(ReportOrderFilterRequest $request , ManagerReportService $report)
    {
        
        $orders = $report->reportFilterOrder($request->all()["orderNumber"]);


        return view("manager.report" , compact("orders"));
    }
}
