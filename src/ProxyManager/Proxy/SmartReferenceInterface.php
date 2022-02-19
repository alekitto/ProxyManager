<?php

declare(strict_types=1);

namespace ProxyManager\Proxy;

/**
 * Smart reference object marker
 *
 * @deprecated this interface is not in use anymore, and should not be relied upon
 *
 * @template SmartReferenceObjectType of object
 * @extends ProxyInterface<SmartReferenceObjectType>
 */
interface SmartReferenceInterface extends ProxyInterface
{
}
