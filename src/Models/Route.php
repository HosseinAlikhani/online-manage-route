<?php

namespace D3cr33\Routes\Models;

use D3cr33\Routes\Contracts\Route as ContractsRoute;
use D3cr33\Routes\Models\factories\RouteFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public $guarded = [ 'id' ];

    protected static function newFactory(): RouteFactory
    {
        return RouteFactory::new();
    }

    public function scopeOfRequestMethod(Builder $query, $requestMethod)
    {
        if ( $requestMethod === null ) return $query;
        return $query->where(ContractsRoute::REQUEST_METHOD, 'like', '%' . $requestMethod . '%');
    }

    public function scopeOfName(Builder $query, $name)
    {
        if ( $name === null ) return $query;
        return $query->where(ContractsRoute::NAME, 'like', '%' . $name . '%' );
    }

    public function scopeOfController(Builder $query, $controller)
    {
        if ( $controller === null ) return $query;
        return $query->where(ContractsRoute::CONTROLLER, 'like', '%' . $controller . '%');
    }

    public function scopeOfControllerMethod(Builder $query, $controllerMethod)
    {
        if ( $controllerMethod === null ) return $query;
        return $query->where(ContractsRoute::CONTROLLER_METHOD, 'like', '%' . $controllerMethod . '%');
    }

    public function scopeOfPrefix(Builder $query, $prefix)
    {
        if ( $prefix === null ) return $query;
        return $query->where(ContractsRoute::PREFIX, 'like', '%' . $prefix . '%');
    }

    public function scopeOfNamespace(Builder $query, $namespace)
    {
        if ( $namespace === null ) return $query;
        return $query->where(ContractsRoute::NAMESPACE, 'like', '%' . $namespace . '%');
    }

    public function scopeOfMiddleware(Builder $query, $middleware)
    {
        if ( $middleware === null ) return $query;
        return $query->where(ContractsRoute::MIDDLEWARE, 'like', '%' . $middleware . '%');
    }

    public function scopeOfThrottle(Builder $query, $throttle)
    {
        if ( $throttle === null ) return $query;
        return $query->where(ContractsRoute::THROTTLE, 'like', '%' . $throttle . '%');
    }

    public function scopeOfOrder(Builder $query, $order)
    {
        if ( $order === null ) return $query;
        return $query->where(ContractsRoute::ORDER, $order);
    }

    public function scopeOfIsGroup(Builder $query, $isGroup)
    {
        if ( $isGroup === null ) return $query;
        return $query->where(ContractsRoute::IS_GROUP, $isGroup);
    }

    public function scopeOfGroupParent(Builder $query, $groupParent)
    {
        if ( $groupParent === null ) return $query;
        return $query->where(ContractsRoute::GROUP_PARENT, $groupParent);
    }
}
