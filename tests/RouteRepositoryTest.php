<?php
namespace D3cr33\Routes\Test;

use D3cr33\Routes\Contracts\Route as ContractsRoute;
use D3cr33\Routes\Contracts\RouteRepositoryinterface;
use D3cr33\Routes\Models\Route;
use D3cr33\Routes\Repositories\RouteRepository;

class RouteRepositoryTest extends TestCase
{
    public RouteRepositoryinterface $routeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->routeRepository = new RouteRepository(new Route());
    }
    
    public function test_route_repository_create()
    {
        $result = $this->routeRepository->create(
            $this->routeFaker->route(true)
        );
        $this->assertInstanceOf(Route::class, $result);
    }

    public function test_route_respository_find()
    {
        $createResult = $this->routeRepository->create(
            $this->routeFaker->route(true)
        );

        $result = $this->routeRepository->find($createResult->id);
        $this->assertEquals( $createResult, $result );
    }

    public function test_route_respository_finds()
    {
        $createResult = collect();
        $createResult->push($this->routeRepository->create(
            $this->routeFaker->route(true)
        ));
        $createResult->push($this->routeRepository->create(
            $this->routeFaker->route(true)
        ));
        $createResult->push($this->routeRepository->create(
            $this->routeFaker->route(true)
        ));

        $ids = $createResult->pluck('id');

        $result = $this->routeRepository
            ->setFilters(['id' => $ids->toArray()])
            ->finds();

        $this->assertEquals( $createResult->toArray(), $result->toArray() );
    }

    public function test_route_respository_update()
    {
        $createResult = $this->routeRepository->create(
            $this->routeFaker->route(true)
        );

        $updateData = $this->routeFaker->route(true);

        $result = $this->routeRepository->update(
            $createResult->id,
            $updateData
        );

        $this->assertEquals( $updateData->getRequestMethod(), $result->{ContractsRoute::REQUEST_METHOD} );
        $this->assertEquals( $updateData->getName(), $result->{ContractsRoute::NAME} );
        $this->assertEquals( $updateData->getController(), $result->{ContractsRoute::CONTROLLER} );
        $this->assertEquals( $updateData->getControllerMethod(),$result->{ContractsRoute::CONTROLLER_METHOD} );
        $this->assertEquals( $updateData->getPrefix(), $result->{ContractsRoute::PREFIX} );
        $this->assertEquals( $updateData->getNamespace(), $result->{ContractsRoute::NAMESPACE} );
        $this->assertEquals( $updateData->getMiddleware(), $result->{ContractsRoute::MIDDLEWARE} );
        $this->assertEquals( $updateData->getThrottle(), $result->{ContractsRoute::THROTTLE} );
        $this->assertEquals( $updateData->getOrder(), $result->{ContractsRoute::ORDER} );
        $this->assertEquals( $updateData->getIsGroup(), $result->{ContractsRoute::IS_GROUP} );
        $this->assertEquals( $updateData->getGroupParent(), $result->{ContractsRoute::GROUP_PARENT} );
    }

    public function test_route_respository_delete()
    {
        $createResult = $this->routeRepository->create(
            $this->routeFaker->route(true)
        );

        $deleteResult = $this->routeRepository->delete( $createResult->id );

        $this->assertTrue( $deleteResult );

        $findResult = $this->routeRepository->find( $createResult->id );

        $this->assertNull( $findResult );
    }
}
