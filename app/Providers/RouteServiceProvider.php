<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';
    public const HOMEADMIN = '/admin';



    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * @var string
     */
    protected $adminNamespace = 'App\Http\Controllers\Admin';

    /**
     * @var string
     */
    protected $supplierNamespace = 'App\Http\Controllers\Supplier';


    /**
     * @var string
     */
    protected $companyNamespace = 'App\Http\Controllers\Company';

      /**
     * @var string
     */
    protected $customerNamespace = 'App\Http\Controllers\Customer';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        parent::boot();
        /* $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        }); */
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

    //MUTAHIR NEW CODE FOR ROUT FILE
    /**
     * Define the routes for the application.
     *
     * @return void
     */

    public function map()

    {
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapCompanyRoutes();
        $this->mapCustomerRoutes();
        $this->mapSupplierRoutes();
        $this->mapApiRoutes();
    }




    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */

    protected function mapAdminRoutes()
    {
        Route::middleware(['guest', 'web','admin'])->prefix('admin')
            ->as('admin.')
            ->namespace($this->adminNamespace)
            ->group(base_path('routes/admin.php'));
    }


     /**
     * Define the "company" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */

     protected function mapCompanyRoutes()
     {
         Route::middleware(['guest', 'web','company'])->prefix('company')
             ->as('company.')
             ->namespace($this->companyNamespace)
             ->group(base_path('routes/company.php'));
     }


      /**
     * Define the "customer" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */

     protected function mapCustomerRoutes()
     {
         Route::middleware(['guest', 'web','customer'])->prefix('customer')
             ->as('customer.')
             ->namespace($this->customerNamespace)
             ->group(base_path('routes/customer.php'));
     }




     /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */

     protected function mapSupplierRoutes()
     {
         Route::middleware(['guest', 'web'])->prefix('supplier')
             ->as('supplier.')
             ->namespace($this->supplierNamespace)
             ->group(base_path('routes/supplier.php'));
     }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
