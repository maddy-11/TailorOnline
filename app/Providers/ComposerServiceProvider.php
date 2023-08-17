<?php

namespace App\Providers;


use App\Http\Composers\SidebarComposer;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         // Global
        View::composer(
            // This class binds the $logged_in_user variable to every view
            '*',
            GlobalComposer::class
        );

        // Admin
        View::composer(
            // This binds items like number of users pending approval when account approval is set to true
            'admin.includes.panels.sidebar',
            SidebarComposer::class
        );
    }
}
