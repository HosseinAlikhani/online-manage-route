<?php

namespace D3cr33\Routes\Models\factories;

use D3cr33\Routes\Contracts\Route as ContractsRoute;
use D3cr33\Routes\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Route::class;

    private $requestMethod = [ 'GET', 'POST', 'PATCH', 'DELETE' ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            ContractsRoute::REQUEST_METHOD  => $this->requestMethod[mt_rand(0, 3)],
            ContractsRoute::NAME    =>  $this->faker->name(),
            ContractsRoute::CONTROLLER  =>  $this->faker->word(),
            ContractsRoute::CONTROLLER_METHOD   =>  $this->faker->word(),
            ContractsRoute::PREFIX  =>  $this->faker->word(),
            ContractsRoute::NAMESPACE   =>  $this->faker->word . '\\' . $this->faker->word(),
            ContractsRoute::MIDDLEWARE  =>  $this->faker->word(),
            ContractsRoute::THROTTLE    =>  $this->faker->word() . ':' . $this->faker->word(),
            ContractsRoute::ORDER   =>  $this->faker->randomDigit(),
            ContractsRoute::IS_GROUP    =>  $this->faker->boolean()
        ];
    }
}
