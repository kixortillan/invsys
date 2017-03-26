<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->registerPackageProviders();
        //dd(Config::get('modules'));
        View::share('sidebar', json_encode(Config::get('modules')));
        //View::share('navlinks');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerRepositoryProviders();
    }

    /**
     * Load service providers from packages when available
     * 
     * @return 
     */
    private function registerPackageProviders()
    {
        if(class_exists(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class))
        {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        
        if(class_exists(\Laravel\Tinker\TinkerServiceProvider::class))
        {
            $this->app->register(\Laravel\Tinker\TinkerServiceProvider::class);
        }
    }

    private function registerRepositoryProviders()
    {
        $this->app->bind(\App\Repositories\Contracts\Auth\UserRepositoryInterface::class, \App\Repositories\Eloquent\Auth\UserRepository::class);
        $this->app->bind(\App\Repositories\Contracts\Auth\GroupRepositoryInterface::class, \App\Repositories\Eloquent\Auth\GroupRepository::class);
        $this->app->bind(\App\Repositories\Contracts\Part\PartNumberExtensionRepositoryInterface::class, \App\Repositories\Eloquent\Part\PartNumberExtensionRepository::class);
        $this->app->bind(\App\Repositories\Contracts\Inventory\StockKeepingUnitRepositoryInterface::class, \App\Repositories\Eloquent\Inventory\StockKeepingUnitRepository::class);
        $this->app->bind(\App\Repositories\Contracts\Part\BrandRepositoryInterface::class, \App\Repositories\Eloquent\Part\BrandRepository::class);
        $this->app->bind(\App\Repositories\Contracts\Utilities\CurrencyRepositoryInterface::class, \App\Repositories\Eloquent\Utilities\CurrencyRepository::class);
    }

}
