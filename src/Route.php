<?php
namespace D3cr33\Routes;

use D3cr33\Routes\Contracts\RouteInterface;

final class Route implements RouteInterface
{
    /**
     * store requestMethod
     * @var ?string
     */
    private ?string $requestMethod;

    /**
     * store name
     * @var ?string
     */
    private ?string $name;

    /**
     * store controller
     * @var ?string
     */
    private ?string $controller;

    /**
     * store controllerMethod
     * @var ?string
     */
    private ?string $controllerMethod;

    /**
     * store prefix
     * @var ?string
     */
    private ?string $prefix;

    /**
     * store namespace
     * @var ?string
     */
    private ?string $namespace;

    /**
     * store middleware
     * @var ?string
     */
    private ?string $middleware;

    /**
     * store throttle
     * @var ?string
     */
    private ?string $throttle;

    /**
     * store order
     * @var int
     */
    private int $order;

    /**
     * store isGroup
     * @var bool
     */
    private bool $isGroup;

    /**
     * store groupParent
     * @var int
     */
    private int $groupParent;

    /**
     * get request method
     * @return ?string
     */
    public function getRequestMethod(): ?string
    {
        return $this->requestMethod;
    }

    /**
     * get name
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * get controller
     * @return ?string
     */
    public function getController(): ?string
    {
        return $this->controller;
    }

    /**
     * get controller method
     * @return ?string
     */
    public function getControllerMethod(): ?string
    {
        return $this->controllerMethod;
    }

    /**
     * get prefix
     * @return ?string
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * get namespace
     * @return ?string
     */
    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    /**
     * get middleware
     * @return ?string
     */
    public function getMiddleware(): ?string
    {
        return $this->middleware;
    }

    /**
     * get throttle
     * @var ?string
     */
    public function getThrottle(): ?string
    {
        return $this->throttle;
    }

    /**
     * get order
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * get is group
     * @return bool
     */
    public function getIsGroup(): bool
    {
        return $this->isGroup;
    }

    /**
     * get group parent
     * @return int
     */
    public function getGroupParent(): int
    {
        return $this->groupParent;
    }
}
