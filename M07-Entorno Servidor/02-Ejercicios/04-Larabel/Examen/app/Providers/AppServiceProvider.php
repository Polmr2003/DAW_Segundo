<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// importamos el paginator
use Illuminate\Pagination\Paginator;

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
        // utilizamos paginator con boostrap 5 para la lista de owners
        Paginator::useBootstrapFive();
    }
}
