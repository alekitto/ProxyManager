<?php

declare(strict_types=1);

namespace ProxyManager\Proxy;

/**
 * Fallback value holder object marker
 *
 * @deprecated this interface is not in use anymore, and should not be relied upon
 *
 * @template InterceptedObjectType of object
 * @extends ProxyInterface<InterceptedObjectType>
 */
interface FallbackValueHolderInterface extends ProxyInterface
{
}
