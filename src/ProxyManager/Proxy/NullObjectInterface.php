<?php

declare(strict_types=1);

namespace ProxyManager\Proxy;

/**
 * Null object marker
 *
 * @template NullObjectType of object
 * @extends ProxyInterface<NullObjectType>
 */
interface NullObjectInterface extends ProxyInterface
{
}
