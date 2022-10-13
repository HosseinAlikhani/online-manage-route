<?php
namespace D3cr33\Routes\Services;

use D3cr33\Routes\Contracts\RouteRepositoryinterface;
use D3cr33\Routes\Contracts\RouteServiceInterface;
use D3cr33\Routes\Models\Route;
use D3cr33\Routes\Route as RoutesRoute;

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
     * @param array $filters
     */
    public function findRoutes(array $filters = [])
    {
        $this->routeRepository->setFilters($filters);
        $this->routeRepository->setPaginate(10);
        return $this->routeRepository->finds();
    }

    /**
     * find route
     * @param string $routeId
     * @return ?Route
     */
    public function findRoute(string $routeId): ?Route
    {
        return $this->routeRepository->find($routeId);
    }

    /**
     * create route
     * @param array $routeData
     * @return ?Route
     */
    public function createRoute(array $routeData): ?Route
    {
        return $this->routeRepository->create(
            RoutesRoute::toObject($routeData)
        );
    }

    /**
     * update route
     * @param string $routeId
     * @param array $routeData
     * @return Route
     */
    public function updateRoute(string $routeId, array $routeData): ?Route
    {
        return $this->routeRepository->update(
            $routeId,
            RoutesRoute::toObject($routeData)
        );
    }

    /**
     * delete route
     * @param string $routeId
     * @return bool
     */
    public function deleteRoute(string $routeId): bool
    {
        return $this->routeRepository->delete($routeId);
    }
}
