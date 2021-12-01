<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Menu_item;
use App\Models\Submenu_item;


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
        //
        
       
        \View::composer('partials.header', function ($view) {
            $menusitem=Menu_item::where('status','=','1')->get();
            $submenusitem=Submenu_item::where('status','=','1')->get();

            $view->with(['menus' => $menusitem, 'submenus' => $submenusitem]);
        });
       

    }
}
