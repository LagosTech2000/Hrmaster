<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//configuracion de costumbre
use Illuminate\Support\Facades\Schema;
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
        //aqui llamaremos al Schem y al paginator
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
