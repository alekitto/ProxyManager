<?php

declare(strict_types=1);

namespace ProxyManager\Proxy;

/**
 * Remote object marker
 *
 * @template RemoteObjectType of object
 * @extends ProxyInterface<RemoteObjectType>
 */
interface RemoteObjectInterface extends ProxyInterface
{
}
