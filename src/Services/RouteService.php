<?php
namespace D3cr33\Routes\Services;

use D3cr33\Routes\Models\Route;
use Illuminate\Support\Collection;

class RouteService
{
    /**
     * Return all routes
     * @param Array $filters
     * @return Collection
     */
    public static function finds(array $filters = []) :Collection
    {
        $routes = Route::all();
        return $routes;
    }

    /**
     * Find Route
     * @param String $routeID
     * @return Collection
     */
    public static function find(String $routeID) :Collection
    {
        return Route::where('id', $routeID)
            ->first();
    }

    /**
     * Create Route
     * @param Array $routeData
     *  $routeData = [
     *      'request_method'    =>  (string) DB request_method,
     *      'name'  =>  (string) DB name,
     *      'prefix'    =>  (string) DB prefix,
     *      'namespace' =>  (string) DB namespace,
     *      'controller'    =>  (string) DB controller,
     *      'controller_method' =>  (string) DB controller_method,
     *      'middleware'    =>  (string) DB middleware,
     *      'throttle'  =>  (string) DB throttle,
     *      'order' =>  (string) DB order
     *  ]
     */
    public static function create(array $routeData) :Collection
    {
        $route = Route::create($routeData);
        return SELF::find($route->id);
    }

    /**
     * @param String $routeID
     * @param Array $routeData
     *  $routeData = [
     *      'request_method'    =>  (string) DB request_method,
     *      'name'  =>  (string) DB name,
     *      'prefix'    =>  (string) DB prefix,
     *      'namespace' =>  (string) DB namespace,
     *      'controller'    =>  (string) DB controller,
     *      'controller_method' =>  (string) DB controller_method,
     *      'middleware'    =>  (string) DB middleware,
     *      'throttle'  =>  (string) DB throttle,
     *      'order' =>  (string) DB order
     *  ]
     * @return collection
     */
    public static function updateRoutes(String $routeID, array $routeData) :Collection
    {
        $route = SELF::find($routeID);
        $route->update($routeData);
        return $route->fresh();
    }

    /**
     * Delete routes
     */
    public static function deleteRoutes(String $routeID) :bool
    {
        $route = SELF::find($routeID);
        $route->delete();
        return true;
    }
}