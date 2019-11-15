<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Salary\SalaryMainPlan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
/*
        $this->app->bind(SalaryMainPlan::class, function ($app) {
            return new SalaryMainPlan();
        });
*/
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
