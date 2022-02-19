<?php

declare(strict_types=1);

namespace ProxyManagerTestAsset;

/**
 * Base test class to play around with mixed visibility properties with different type definitions
 */
class ClassWithUnionTypedProperties
{
    public static EmptyClass | string $publicStaticUnionProperty                = 'publicStaticUnionProperty';
    public static EmptyClass | string | null $publicStaticNullableUnionProperty = 'publicStaticUnionProperty';
    public static EmptyClass | string | null $publicStaticNullableUnionPropertyWithoutDefaultValue;

    protected static EmptyClass | string $protectedStaticUnionProperty                = 'protectedStaticUnionProperty';
    protected static EmptyClass | string | null $protectedStaticNullableUnionProperty = 'protectedStaticUnionProperty';
    protected static EmptyClass | string | null $protectedStaticNullableUnionPropertyWithoutDefaultValue;

    private static EmptyClass | string $privateStaticUnionProperty                = 'privateStaticUnionProperty';
    private static EmptyClass | string | null $privateStaticNullableUnionProperty = 'privateStaticUnionProperty';
    private static EmptyClass | string | null $privateStaticNullableUnionPropertyWithoutDefaultValue;

    public EmptyClass | string $publicUnionProperty                = 'publicUnionProperty';
    public EmptyClass | string | null $publicNullableUnionProperty = 'publicUnionProperty';

    protected EmptyClass | string $protectedUnionProperty                = 'protectedUnionProperty';
    protected EmptyClass | string | null $protectedNullableUnionProperty = 'protectedUnionProperty';

    private EmptyClass | string $privateUnionProperty                = 'privateUnionProperty';
    private EmptyClass | string | null $privateNullableUnionProperty = 'privateUnionProperty';
}
