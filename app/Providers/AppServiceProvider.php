<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

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
        /**************** Category View ************************/
        View::composer(['*'], function($view){
            $menus = \App\Models\Category::with('subcategories')->get();
            $view->with('menus', $menus);
        });
    }
}
