<?php
namespace D3cr33\Routes\Test\fakers;

use D3cr33\Routes\Contracts\Route as RouteContracts;
use D3cr33\Routes\Route;
use Faker\Factory;
use Faker\Generator;

class RouteFaker
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function route($routeInstance = false)
    {
        $route = [
            RouteContracts::REQUEST_METHOD  =>  $this->requestMethod(),
            RouteContracts::NAME    =>      $this->faker->lexify(),
            RouteContracts::CONTROLLER  =>  $this->faker->lexify('???????Controller'),
            RouteContracts::CONTROLLER_METHOD   =>  $this->faker->lexify(),
            RouteContracts::PREFIX  =>  $this->faker->lexify(),
            RouteContracts::NAMESPACE   =>  $this->namespace(),
            RouteContracts::MIDDLEWARE  =>  $this->faker->lexify(),
            RouteContracts::THROTTLE    =>  $this->throttle(),
            RouteContracts::ORDER   =>  0,
            RouteContracts::IS_GROUP    =>  false,
            RouteContracts::GROUP_PARENT    =>  0
        ];
        return $routeInstance ? Route::toObject($route) : $route;
    }

    public function requestMethod()
    {
        return $this->faker->randomElement(['get', 'post', 'patch', 'delete', 'put']);
    }

    public function namespace()
    {
        return $this->faker->lexify('??????\??????\??????');
    }

    public function throttle()
    {
        return $this->faker->bothify('#:#');
    }
}
