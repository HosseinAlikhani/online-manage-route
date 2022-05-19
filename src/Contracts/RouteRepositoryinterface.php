<?php
namespace D3cr33\Routes\Contracts;

use D3cr33\Routes\Models\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RouteRepositoryinterface
{
    /**
     * create new model instance and assign to model property
     * @return void
     */
    public function __construct(Model $model);

    /**
     * finds routes
     * @param array $filters
     * @return Collection
     */
    public function finds(array $filters = []): Collection;

    /**
     * Find Route
     * @param String $routeId
     * @return Route|null
     */
    public function find(String $routeId): Route|null;

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
    public function create(array $routeData) :Route;

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
    public function update(string $routeId, array $routeData): Route|null;

    /**
     * delete route
     * @param string $routeId
     * @return bool
     */
    public function delete(string $routeId): bool;
}
