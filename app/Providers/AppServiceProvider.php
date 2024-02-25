<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        //

        Paginator::useBootstrap();


         //User
         view()->composer('*', function($view){
            if (Auth::check()) {
                  $view->with('currentUser', Auth::user());
            }else {
                  $view->with('currentUser', null);
            }
         });

        $categories = Category::take(5)->get();
        view()->share('categories', $categories);

        $setting = Setting::first();
        view()->share('setting', $setting);


    }
}
