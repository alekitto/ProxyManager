<?php

declare(strict_types=1);

namespace ProxyManagerTestAsset;

use BadMethodCallException;
use Countable;

/**
 * Base test class to play around with mixed visibility properties with different type definitions
 */
class ClassWithIntersectionTypes
{
    public static EmptyClass & BaseInterface $publicStaticIntersectionProperty;
    protected static EmptyClass & BaseInterface $protectedStaticIntersectionProperty;
    private static EmptyClass & BaseInterface $privateStaticIntersectionProperty;

    public EmptyClass & BaseInterface $publicIntersectionProperty;
    protected EmptyClass & BaseInterface $protectedIntersectionProperty;
    private EmptyClass & BaseInterface $privateIntersectionProperty;

    public function intersectionType(BaseInterface & Countable $parameter): ReturnTypeHintedInterface & ScalarTypeHintedInterface
    {
        throw new BadMethodCallException('Not supposed to be run');
    }
}
