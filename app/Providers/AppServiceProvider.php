<?php

namespace App\Providers;

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
        $this->app->bind('App\Repositories\IJob', 'App\Repositories\IJob');
        $this->app->bind('App\Repositories\JobRepository', 'App\Repositories\JobRepository');
        $this->app->bind('App\Http\Controllers\JobController', 'App\Http\Controllers\JobController');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
