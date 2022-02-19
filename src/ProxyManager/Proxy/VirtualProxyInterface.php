<?php

declare(strict_types=1);

namespace ProxyManager\Proxy;

/**
 * Virtual Proxy - a lazy initializing object wrapping around the proxied subject
 *
 * @template VirtualObjectType of object
 * @extends LazyLoadingInterface<VirtualObjectType>
 * @extends ValueHolderInterface<VirtualObjectType>
 */
interface VirtualProxyInterface extends LazyLoadingInterface, ValueHolderInterface
{
}
