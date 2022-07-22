<?php
namespace D3cr33\Routes\Contracts;


interface RouteInterface
{
    /**
     * get request method
     * @return ?string
     */
    public function getRequestMethod(): ?string;

    /**
     * get name
     * @return ?string
     */
    public function getName(): ?string;

    /**
     * get controller
     * @return ?string
     */
    public function getController(): ?string;

    /**
     * get controller method
     * @return ?string
     */
    public function getControllerMethod(): ?string;

    /**
     * get prefix
     * @return ?string
     */
    public function getPrefix(): ?string;

    /**
     * get namespace
     * @return ?string
     */
    public function getNamespace(): ?string;

    /**
     * get middleware
     * @return ?string
     */
    public function getMiddleware(): ?string;

    /**
     * get throttle
     * @var ?string
     */
    public function getThrottle(): ?string;

    /**
     * get order
     * @return int
     */
    public function getOrder(): int;

    /**
     * get is group
     * @return bool
     */
    public function getIsGroup(): bool;

    /**
     * get group parent
     * @return int
     */
    public function getGroupParent(): int;
}
