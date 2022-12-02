<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Services\Manager\ManagerReportService;
use Illuminate\Http\Request;

class ManagerOrderReportController extends Controller
{


    public function reportAll(ManagerReportService $report)
    {
        $orders = $report->reportCompletedOrders();

        return view("manager.report" , compact("orders"));
    }
}
