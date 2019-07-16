<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Admin\ApplicationDeadlines as AD;
use Illuminate\Support\Facades\View;
use  Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('layouts.front', function ($view) {
            $view->with('exam_seasons', AD::where('status',AD::ACCOMPLISHED)->where('is_published',AD::PUBLISHED)->orderBy('deadline','desc')->take(10)->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
