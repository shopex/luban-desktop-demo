<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Shopex\LubanAdmin\Permission\Menu;
use App\Role;
use Shopex\LubanAdmin\Facades\Admin;
class DesktopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menu = new Menu();
        view()->share("app_name", config('app.name','Admin'));
        
        view()->share('app_menus', config('desktop.menus'));

        view()->share('searchbar', config('desktop.searchbar'));

        $objcect = config('input.object');
        $objcect();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
