<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Shopex\LubanAdmin\Permission\Menu;
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

        view()->share('searchbar', [
                ['label'=>'搜索用户', 'action'=>'/search/user', 'regexp'=>'[a-z0-9\.\_\+\-]'],
                ['label'=>'搜索手机号', 'action'=>'/search/phone', 'regexp'=>'^[0-9\s]+$'],
                ['label'=>'搜索邮箱', 'action'=>'/search/email', 'regexp'=>'^[a-z0-9\.\_\+\-]+@[a-z0-9\.\_\-]+$'],
            ]);
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
