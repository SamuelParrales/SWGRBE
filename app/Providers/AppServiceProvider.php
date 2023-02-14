<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

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
        Paginator::useBootstrapFive();
        $icons = [
            1 => 'fa-solid fa-toilet-portable',
            2 => 'fa-solid fa-blender',
            3 => 'fa-solid fa-computer',
            4 => 'fa-solid fa-radio',
            5 => 'fa-solid fa-lightbulb',
            6 => 'fa-solid fa-toolbox',
            7 => 'fa-solid fa-gamepad' ,
            8 => 'fa-solid fa-laptop-medical',
            9 => 'fa-solid fa-building-shield',
            10 => 'fa-solid fa-indent ',
        ];
        if(Schema::hasTable('categories'))
        {
            $categories = Category::all();
            View::share(compact('categories','icons'));
        }

        //
    }
}
