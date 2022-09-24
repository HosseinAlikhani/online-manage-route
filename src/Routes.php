<?php
namespace D3cr33\Routes;

use D3cr33\Routes\Contracts\Route;
use D3cr33\Routes\Contracts\RoutesInterface;
use D3cr33\Routes\Route as RoutesRoute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route as FacadesRoute;

final class Routes implements RoutesInterface
{
    private $routes = [];

    private function __construct()
    {
        $this->getRoutesFromDb();

        $this->registerRoutes();
    }

    public static function compile()
    {
        return new static();
    }

    private function getRoutesFromDb(): void
    {
        $routes = DB::table(Route::TABLE)->get();

        foreach( $routes as $route ) {
            $this->routes[] = RoutesRoute::toObject( (array) $route );
        }
    }

    private function registerRoutes()
    {
        foreach( $this->routes as $route ) {
            call_user_func(
                [FacadesRoute::class, $route->getRequestMethod() ],
                $route->getName(),
                $route->getNamespace().'\\'.$route->getController().'@'.$route->getControllerMethod(),
            )->middleware($this->serializeMiddleware($route));
        }
    }

    private function serializeMiddleware($route)
    {
        $middleware = [];
        if ( $route->getMiddleware() ) $middleware[] = $route->getMiddleware();
        if ( $route->getThrottle() ) $middleware[] = 'throttle:'.$route->getThrottle();

        return $middleware;
    }
}
