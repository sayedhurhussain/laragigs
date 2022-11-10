<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // Not require the fillable in Models - Working without add the attributes in Models
        Model::unguard();
        // Use different pagination style
        // Paginator::useBootstrapFive();
        // Paginator::useBootstrap();
        
    }
}
