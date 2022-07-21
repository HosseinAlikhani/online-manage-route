<?php
namespace D3cr33\Routes;

use D3cr33\Routes\Contracts\RouteRepositoryinterface;
use D3cr33\Routes\Contracts\RouteServiceInterface;
use D3cr33\Routes\Repositories\RouteRepository;
use D3cr33\Routes\Services\RouteService;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RouteServiceInterface::class, RouteService::class);
        $this->app->bind(RouteRepositoryinterface::class, RouteRepository::class);
    }

    public function boot()
    {
        $this->registerAndPublishMigrations();

        RouteRegister::registerFromDb();
    }


    /**
     * register migrations
     */
    private function registerAndPublishMigrations()
    {
        // load migration files
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // publish migration files
        $this->publishes([
            __DIR__.'./../database/migrations'  =>  database_path('migrations'),
        ],'d3cr33-route-migrations');
    }
}
