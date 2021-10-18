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

    private static $_instance = null;

    public function __construct()
    {
        self::$_instance = new self;
    }

    public static function setRoute($route)
    {
        static::$route = $route;
    }

    /**
     * Register route to container
     * @param Route $route
     */
    public static function register(Route $route)
    {
        dd('route', static::$route );
        // call_user_func(
            // [FacadesRoute::class, $route->request_method],
            // $route->name,
        // );
    }
}