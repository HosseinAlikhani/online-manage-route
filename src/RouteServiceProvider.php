<?php
namespace D3cr33\Routes;

use D3cr33\Routes\Services\RouteService;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->registerAndPublishMigrations();
    }


    private function registerAndPublishMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'./../database/migrations'  =>  database_path('migrations'),
        ],'d3cr33-route-migrations');
    }
}