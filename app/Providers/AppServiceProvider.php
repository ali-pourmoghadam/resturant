<?php

namespace App\Providers;

use App\Helpers\AppHelpers;
use App\Http\Controllers\Manager\ManagerController;
use App\Services\Contracts\NotificationsContract;
use App\Services\Manager\ManagerNotificationService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        // Bind application helper as singleton class
        
        $this->app->singleton( AppHelpers::class , function () {

                return new AppHelpers();

        });

        // Bind notificationMnager as manager notification system

         $this->app->when(ManagerController::class)
                  ->needs(NotificationsContract::class)
                  ->give(function(){
                        return new ManagerNotificationService;
                        });

        
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
    }
}
