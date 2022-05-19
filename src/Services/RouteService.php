<?php
namespace D3cr33\Routes\Services;

use D3cr33\Routes\Contracts\RouteRepositoryinterface;
use D3cr33\Routes\Contracts\RouteServiceInterface;
use D3cr33\Routes\Models\Route;

class RouteService implements RouteServiceInterface
{
    /**
     * store route Repository
     * @var RouteRepositoryInterface
     */
    private RouteRepositoryinterface $routeRepository;

    public function __construct(RouteRepositoryinterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    /**
     * find routes
     */
    public function findRoutes()
    {

    }

    /**
     * find route
     * @param string $routeId
     * @return ?Route
     */
    public function findRoute(string $routeId): ?Route
    {

    }

    /**
     * create route
     * @param array $routeData
     * @return Route
     */
    public function createRoute(array $routeData): Route
    {

    }

    /**
     * update route
     * @param string $routeId
     * @param array $routeData
     * @return Route
     */
    public function updateRoute(string $routeId, array $routeData): ?Route
    {

    }

    /**
     * delete route
     * @param string $routeId
     * @return bool
     */
    public function deleteRoute(string $routeId): bool
    {

    }
}
