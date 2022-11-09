<?php

namespace App\Providers;

use App\Helpers\AppHelpers;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // Create Just One Inctance of Object
        

        $this->app->singleton( AppHelpers::class , function ($app) {

            return new AppHelpers();

        });
    }
}
