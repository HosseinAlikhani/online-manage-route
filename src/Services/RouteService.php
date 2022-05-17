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
    public static function find(String $routeID)
    {
        return Route::where('id', $routeID)
            ->first();
    }

    /**
     * Create Route
     * @param Array $routeData
     * @var string $routeData[request_method]
     * @var string $routeData[name]
     * @var string $routeData[prefix]
     * @var string $routeData[namespace]
     * @var string $routeData[controller]
     * @var string $routeData[controller_method]
     * @var string $routeData[middleware]
     * @var string $routeData[throttle]
     * @var string $routeData[order]
     */
    public static function create(array $routeData) :Route
    {
        $route = Route::create($routeData);
        return SELF::find($route->id);
    }

    /**
     * @param String $routeID
     * @param Array $routeData
     * @var string $routeData[request_method]
     * @var string $routeData[name]
     * @var string $routeData[prefix]
     * @var string $routeData[namespace]
     * @var string $routeData[controller]
     * @var string $routeData[controller_method]
     * @var string $routeData[middleware]
     * @var string $routeData[throttle]
     * @var string $routeData[order]
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
