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
        $this->registerServiceProviders();
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
        $this->app->bind(\App\Repositories\Contracts\UserRepositoryInterface::class, \App\Repositories\Eloquent\UserRepository::class);
    }

    /**
     * Load service providers when available
     * 
     * @return 
     */
    private function registerServiceProviders()
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

}
