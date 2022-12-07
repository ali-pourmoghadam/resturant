<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminReportService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    
    public function index(AdminReportService $reportServive)
    {
    
        $countUsers =  $reportServive->countUsers("User");

        $countCities = $reportServive->countCities("City");

        $countResturants = $reportServive->countResturants("Resturant") ;

        $countOrders = $reportServive->countOrders("Order") ;

        $bestSellers = $reportServive->bestSellers(3);

        $incomeByMonth = $reportServive->incomeByMonth();

 
        return view('admin.dashboard' , [

            "count" => [

                "users" => $countUsers ,

                "cities" => $countCities ,
                
                "resturants" => $countResturants ,

                "orders" => $countOrders ,

            ] , 

            "bestSellers" => $bestSellers ,

            "incomeByMonth" => $incomeByMonth
        ]);
    } 
    
}
