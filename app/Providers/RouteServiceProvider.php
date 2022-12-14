<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Comment;
use App\Models\Resturant;
use App\Models\User;
use Exception;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Throwable;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {

        
        $this->configureRateLimiting();


        $this->routes(function () {

            Route::middleware('api')
                ->prefix('api/v1/user/')
                ->group(base_path('routes/api/v1//user.php'));


            Route::middleware('web')
                ->group(base_path('routes/web/web.php'));


            Route::middleware('web')
                ->prefix("admin")
                ->group(base_path('routes/web/admin.php'));


            Route::middleware('web')
                ->prefix("manager")
                ->group(base_path('routes/web/manager.php'));
                
        });

    
        Route::bind('address', function(int $id ){

            return (Route::current()->methods[0] == "GET") ? User::find($id) : Address::find($id) ;

        });

        
        Route::bind('resturant', function(int $id ){

            return Resturant::find($id) ?? false ;

        });

        Route::bind('Comment', function ($id) {

            return Comment::withTrashed()->find($id);

        });
 

    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
