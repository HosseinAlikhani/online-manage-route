<?php
namespace D3cr33\Routes\Contracts;

use D3cr33\Routes\Models\Route;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface RouteRepositoryinterface
{
    /**
     * create new route instance and assign to model property
     * @param Route $route
     * @return void
     */
    public function __construct(Route $route);

    /**
     * finds routes
     * @param array $filters
     * @return Collection|LengthAwarePaginator
     */
    public function finds(): Collection|LengthAwarePaginator;

    /**
     * Find Route
     * @param String $routeId
     * @return Route|null
     */
    public function find(String $routeId): Route|null;

    /**
     * Create Route
     * @param RouteInterface $route
     * @return ?Route;
     */
    public function create(RouteInterface $route): ?Route;

    /**
     * update Route
     * @param string $routeId
     * @param RouteInterface $route
     * @return Route|null
     */
    public function update(string $routeId, RouteInterface $route): ?Route;

    /**
     * delete route
     * @param string $routeId
     * @return bool
     */
    public function delete(string $routeId): bool;

    /**
     * set filter params
     * @param array $filterParams
     * @return RouteRepositoryinterface
     */
    public function setFilters(array $filterParams): RouteRepositoryinterface;

    /**
     * set paginate page
     * @return RouteRepositoryInterface
     */
    public function setPaginate(string $paginatePage): RouteRepositoryinterface;
}
