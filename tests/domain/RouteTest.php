<?php
namespace D3cr33\Routes\Test\domain;

use D3cr33\Routes\Route;
use D3cr33\Routes\Test\TestCase;

class RouteTest extends TestCase
{
    public function test_route_to_object_with_getter_methods()
    {
        $routeArray = $this->routeFaker->route(false);
        $routeInstance = Route::toObject($routeArray);

        $this->assertEquals($routeArray['request_method'], $routeInstance->getRequestMethod());
        $this->assertEquals($routeArray['name'], $routeInstance->getName());
        $this->assertEquals($routeArray['controller'], $routeInstance->getController());
        $this->assertEquals($routeArray['controller_method'], $routeInstance->getControllerMethod());
        $this->assertEquals($routeArray['prefix'], $routeInstance->getPrefix());
        $this->assertEquals($routeArray['namespace'], $routeInstance->getNamespace());
        $this->assertEquals($routeArray['middleware'], $routeInstance->getMiddleware());
        $this->assertEquals($routeArray['throttle'], $routeInstance->getThrottle());
        $this->assertEquals($routeArray['order'], $routeInstance->getOrder());
        $this->assertEquals($routeArray['is_group'], $routeInstance->getIsGroup());
        $this->assertEquals($routeArray['group_parent'], $routeInstance->getGroupParent());
    }

    public function test_route_to_array()
    {
        $routeArray = $this->routeFaker->route(false);
        $routeInstance = Route::toObject($routeArray);
        $routeInstanceArray = $routeInstance->toArray();

        $this->assertEquals( $routeArray['request_method'], $routeInstanceArray['request_method'] );
        $this->assertEquals( $routeArray['name'], $routeInstanceArray['name'] );
        $this->assertEquals( $routeArray['controller'], $routeInstanceArray['controller'] );
        $this->assertEquals( $routeArray['controller_method'], $routeInstanceArray['controller_method'] );
        $this->assertEquals( $routeArray['prefix'], $routeInstanceArray['prefix'] );
        $this->assertEquals( $routeArray['namespace'], $routeInstanceArray['namespace'] );
        $this->assertEquals( $routeArray['middleware'], $routeInstanceArray['middleware'] );
        $this->assertEquals( $routeArray['throttle'], $routeInstanceArray['throttle'] );
        $this->assertEquals( $routeArray['order'], $routeInstanceArray['order'] );
        $this->assertEquals( $routeArray['is_group'], $routeInstanceArray['is_group'] );
        $this->assertEquals( $routeArray['group_parent'], $routeInstanceArray['group_parent'] );
    }
}