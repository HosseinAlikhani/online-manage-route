<?php
namespace D3cr33\Routes\Services\Repositories;

use D3cr33\Routes\Contracts\RouteRepositoryinterface;
use D3cr33\Routes\Models\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

final class RouteRepositories implements RouteRepositoryinterface
{
    /**
     * store route instance
     * @var Model
     */
    private Model $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * finds routes
     * @param array $filters
     * @return Collection
     */
    public function finds(array $filters = []): Collection
    {
        //
    }

    /**
     * Find Route
     * @param String $routeId
     * @return Route|null
     */
    public function find(string $routeId): ?Route
    {
        return $this->model->find($routeId);
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
     * @return Route;
     */
    public function create(array $routeData): Route
    {
        $route = $this->model->create($routeData);
        return $this->find($route->id);
    }

    /**
     * update Route
     * @param string $routeId
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
     * @return Route|null
     */
    public function update(string $routeId, array $routeData): ?Route
    {
        $route = $this->find($routeId);
        if ( !$route ) return false;
        $route->update($routeData);
        return $route->fresh();
    }

    /**
     * delete route
     * @param string $routeId
     * @return bool
     */
    public function delete(string $routeId): bool
    {
        $route = $this->find($routeId);
        if ( !$route ) return false;
        return $route->delete();
    }
}
