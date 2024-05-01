<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Here, we will use bootstrap 5 for pagination. so, we need to import it on AppServiceProvider.php file. let's update it.
        Paginator::useBootstrapFive();
        Blade::withoutDoubleEncoding();
    }
}
