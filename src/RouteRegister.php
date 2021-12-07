<?php
namespace D3cr33\Routes;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route as FacadesRoute;

class RouteRegister
{
    /**
    * Register route from db to container
    */
    public static function registerFromDb()
    {
        try {
            $routes = static::findRoutesFromDb();
            $routes->map( function($route) {
                call_user_func(
                    [FacadesRoute::class, $route->request_method ],
                    $route->name,
                    $route->namespace.'\\'.$route->controller.'@'.$route->controller_method,
                )->middleware(static::serializeMiddleware($route));
            });
        }catch(Exception $e) {

        }

    }

    private static function findRoutesFromDb(): Collection
    {
        $routes = DB::table('routes')->get();
        return collect($routes);
    }

    private static function serializeMiddleware($route)
    {
        $middleware = [];
        if ( $route->middleware ) $middleware[] = $route->middleware;
        if ( $route->throttle ) $middleware[] = 'throttle:'.$route->throttle;
        return $middleware;
    }
}