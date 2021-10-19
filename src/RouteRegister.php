<?php
namespace D3cr33\Routes;

use Illuminate\Support\Facades\Route as FacadesRoute;

class RouteRegister
{
    /**
     * The route collection instance
     * @var Route
     */
    protected static $route;


    public function __construct()
    {
    }

    public static function setRoute($route)
    {
        static::$route = $route;
    }

    /**
     * Register route to container
     * @param Route $route
     */
    public static function register($route)
    {
        // call_user_func(
            // [FacadesRoute::class, $route->request_method],
            // $route->name,
        // );
    }
}