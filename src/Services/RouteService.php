<?php
namespace D3cr33\Routes\Services;

use D3cr33\Routes\Models\Route;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Boolean;

class RouteService
{
    /**
     * Instance of route
     */
    protected $model;
    
    public function __construct(Route $route)
    {
        $this->model = $route;
    }

    /**
     * Return all routes
     * @param Array $filters
     * @return Collection
     */
    public function findRoutes(array $filters = []) :Collection
    {
        return collect([]);
    }

    /**
     * Find Route
     * @param String $routeID
     * @return Collection
     */
    public function findRoute(String $routeID) :Collection
    {
        return $this->model
            ->where('id', $routeID)
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
    public function createRoutes(array $routeData) :Collection
    {
        $route = $this->model->create($routeData);
        return $this->findRoute($route->id);
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
    public function updateRoutes(String $routeID, array $routeData) :Collection
    {
        $route = $this->findRoute($routeID);
        $route->update($routeData);
        return $route->fresh();
    }

    /**
     * Delete routes
     */
    public function deleteRoutes(String $routeID) :Boolean
    {
        $route = $this->findRoute($routeID);
        $route->delete();
        return true;
    }
}