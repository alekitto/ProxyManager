<?php

declare(strict_types=1);

namespace ProxyManager\Exception;

use LogicException;
use ProxyManager\ProxyGenerator\Util\Properties;
use ReflectionClass;
use ReflectionProperty;

use function array_map;
use function implode;
use function sprintf;

/**
 * Exception for invalid proxied classes
 */
class UnsupportedProxiedClassException extends LogicException implements ExceptionInterface
{
    public static function nonReferenceableLocalizedReflectionProperties(
        ReflectionClass $class,
        Properties $properties
    ): self {
        return new self(sprintf(
            'Cannot create references for following properties of class %s: %s',
            $class->getName(),
            implode(', ', array_map(static fn (ReflectionProperty $property): string => $property->getName(), $properties->getInstanceProperties()))
        ));
    }
}
