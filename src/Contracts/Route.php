<?php
namespace D3cr33\Routes\Contracts;

interface Route
{
    public const TABLE = 'routes';
    public const ID = 'id';
    public const REQUEST_METHOD = 'request_method';
    public const NAME = 'name';
    public const CONTROLLER = 'controller';
    public const CONTROLLER_METHOD = 'controller_method';
    public const PREFIX = 'prefix';
    public const NAMESPACE = 'namespace';
    public const MIDDLEWARE = 'middleware';
    public const THROTTLE = 'throttle';
    public const ORDER = 'order';
    public const IS_GROUP = 'is_group';
    public const GROUP_PARENT = 'group_parent';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';
}
