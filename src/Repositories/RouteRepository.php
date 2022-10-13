<?php
namespace D3cr33\Routes\Repositories;

use D3cr33\Routes\Contracts\Route as ContractsRoute;
use D3cr33\Routes\Contracts\RouteInterface;
use D3cr33\Routes\Contracts\RouteRepositoryinterface;
use D3cr33\Routes\Models\Route;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class RouteRepository implements RouteRepositoryinterface
{
    /**
     * store route instance
     * @var Route
     */
    private Route $route;

    /**
     * store filter params
     * @var ?array
     */
    private array $filterParams = [];

    /**
     * store pagiante page
     * @var ?string
     */
    private ?string $paginatePage = null;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * finds routes
     * @param array $filters
     * @return Collection|LengthAwarePaginator
     */
    public function finds(): Collection|LengthAwarePaginator
    {
        // query instance from Route Model
        $instance = $this->route->query();

        // foreach on filters and call scope method
        foreach( $this->getFilters() as $key => $filter ) {

            // change snakeCase to camelCase
            $scopeName = str_replace(' ', '', ucwords( str_replace('_', ' ', $key) ) );

            // generate scope method name
            $scopeMethodName = 'scopeOf' . $scopeName;

            // check if method exists call scope
            if ( method_exists($this->route, $scopeMethodName ) ) {

                // call Route Model scope
                $instance = $instance->{'of' . $scopeName}($filter);
            }
        }

        if ( $this->getPaginate() ) {
            $instance = $instance->paginate( $this->getPaginate() );
        } else {
            $instance = $instance->get();
        }

        return $instance;
    }

    /**
     * Find Route
     * @param String $routeId
     * @return Route|null
     */
    public function find(string $routeId): ?Route
    {
        return $this->route->find($routeId);
    }

    /**
     * Create Route
     * @param RouteInterface $route
     * @return ?Route;
     */
    public function create(RouteInterface $route): ?Route
    {
        $route = $this->route->create($route->toArray());
        return $this->find($route->id);
    }

    /**
     * update Route
     * @param string $routeId
     * @param RouteInterface $route
     * @return Route|null
     */
    public function update(string $routeId, RouteInterface $route): ?Route
    {
        $route = $this->find($routeId);
        if ( !$route ) return false;
        $route->update($route->toArray());
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

    /**
     * set filter params
     * @param array $filterParams
     * @return RouteRepositoryinterface
     */
    public function setFilters(array $filterParams): RouteRepositoryinterface
    {
        $this->filterParams = [
            ContractsRoute::REQUEST_METHOD  =>  $filterParams['request_method'] ?? null,
            ContractsRoute::NAME    =>  $filterParams['name'] ?? null,
            ContractsRoute::CONTROLLER  =>  $filterParams['controller'] ?? null,
            ContractsRoute::CONTROLLER_METHOD   =>  $filterParams['controller_method'] ?? null,
            ContractsRoute::PREFIX  =>  $filterParams['prefix'] ?? null,
            ContractsRoute::NAMESPACE   =>  $filterParams['namespace'] ?? null,
            ContractsRoute::MIDDLEWARE  =>  $filterParams['middleware'] ?? null,
            ContractsRoute::THROTTLE    =>  $filterParams['throttle'] ?? null,
            ContractsRoute::ORDER   =>  $filterParams['order'] ?? null,
            ContractsRoute::IS_GROUP    =>  $filterParams['is_group'] ?? null,
            ContractsRoute::GROUP_PARENT    =>  $filterParams['group_parent'] ?? null,
            ContractsRoute::CREATED_AT  =>  [],
            ContractsRoute::UPDATED_AT  =>  [],
            ContractsRoute::DELETED_AT  =>  [],
        ];

        return $this;
    }

    /**
     * set paginate page
     * @return RouteRepositoryInterface
     */
    public function setPaginate(string $paginatePage): RouteRepositoryinterface
    {
        $this->paginatePage = $paginatePage;
        return $this;
    }

    /**
     * get filter params
     * @return array
     */
    private function getFilters(): array
    {
        return $this->filterParams;
    }

    /**
     * get paginate page
     * @return ?string
     */
    private function getPaginate(): ?string
    {
        return $this->paginatePage;
    }
}
