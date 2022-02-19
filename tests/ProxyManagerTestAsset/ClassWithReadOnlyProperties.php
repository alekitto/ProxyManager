<?php

declare(strict_types=1);

namespace ProxyManagerTestAsset;

/**
 * Base test class to play around with mixed visibility readonly properties with different type definitions
 */
class ClassWithReadOnlyProperties
{
    public readonly mixed $publicMixedProperty;
    public readonly stdClass | bool $publicUnionProperty;
    public readonly bool $publicBoolProperty;
    public readonly ?bool $publicNullableBoolProperty;
    public readonly int $publicIntProperty;
    public readonly ?int $publicNullableIntProperty;
    public readonly float $publicFloatProperty;
    public readonly ?float $publicNullableFloatProperty;
    public readonly string $publicStringProperty;
    public readonly ?string $publicNullableStringProperty;
    public readonly array $publicArrayProperty;
    public readonly ?array $publicNullableArrayProperty;
    public readonly iterable $publicIterableProperty;
    public readonly ?iterable $publicNullableIterableProperty;

    protected readonly mixed $protectedMixedProperty;
    protected readonly stdClass | bool $protectedUnionProperty;
    protected readonly bool $protectedBoolProperty;
    protected readonly ?bool $protectedNullableBoolProperty;
    protected readonly int $protectedIntProperty;
    protected readonly ?int $protectedNullableIntProperty;
    protected readonly float $protectedFloatProperty;
    protected readonly ?float $protectedNullableFloatProperty;
    protected readonly string $protectedStringProperty;
    protected readonly ?string $protectedNullableStringProperty;
    protected readonly array $protectedArrayProperty;
    protected readonly ?array $protectedNullableArrayProperty;
    protected readonly iterable $protectedIterableProperty;
    protected readonly ?iterable $protectedNullableIterableProperty;

    private readonly mixed $privateMixedProperty;
    private readonly stdClass | bool $privateUnionProperty;
    private readonly bool $privateBoolProperty;
    private readonly ?bool $privateNullableBoolProperty;
    private readonly int $privateIntProperty;
    private readonly ?int $privateNullableIntProperty;
    private readonly float $privateFloatProperty;
    private readonly ?float $privateNullableFloatProperty;
    private readonly string $privateStringProperty;
    private readonly ?string $privateNullableStringProperty;
    private readonly array $privateArrayProperty;
    private readonly ?array $privateNullableArrayProperty;
    private readonly iterable $privateIterableProperty;
    private readonly ?iterable $privateNullableIterableProperty;

    public function __construct()
    {
        $this->publicMixedProperty            = 'publicMixedProperty';
        $this->publicUnionProperty            = false;
        $this->publicBoolProperty             = true;
        $this->publicNullableBoolProperty     = true;
        $this->publicIntProperty              = 123;
        $this->publicNullableIntProperty      = 123;
        $this->publicFloatProperty            = 123.456;
        $this->publicNullableFloatProperty    = 123.456;
        $this->publicStringProperty           = 'publicStringProperty';
        $this->publicNullableStringProperty   = 'publicStringProperty';
        $this->publicArrayProperty            = ['publicArrayProperty'];
        $this->publicNullableArrayProperty    = ['publicArrayProperty'];
        $this->publicIterableProperty         = ['publicIterableProperty'];
        $this->publicNullableIterableProperty = ['publicIterableProperty'];

        $this->protectedMixedProperty            = 'protectedMixedProperty';
        $this->protectedUnionProperty            = false;
        $this->protectedBoolProperty             = true;
        $this->protectedNullableBoolProperty     = true;
        $this->protectedIntProperty              = 123;
        $this->protectedNullableIntProperty      = 123;
        $this->protectedFloatProperty            = 123.456;
        $this->protectedNullableFloatProperty    = 123.456;
        $this->protectedStringProperty           = 'protectedStringProperty';
        $this->protectedNullableStringProperty   = 'protectedStringProperty';
        $this->protectedArrayProperty            = ['protectedArrayProperty'];
        $this->protectedNullableArrayProperty    = ['protectedArrayProperty'];
        $this->protectedIterableProperty         = ['protectedIterableProperty'];
        $this->protectedNullableIterableProperty = ['protectedIterableProperty'];

        $this->privateMixedProperty            = 'privateMixedProperty';
        $this->privateUnionProperty            = false;
        $this->privateBoolProperty             = true;
        $this->privateNullableBoolProperty     = true;
        $this->privateIntProperty              = 123;
        $this->privateNullableIntProperty      = 123;
        $this->privateFloatProperty            = 123.456;
        $this->privateNullableFloatProperty    = 123.456;
        $this->privateStringProperty           = 'privateStringProperty';
        $this->privateNullableStringProperty   = 'privateStringProperty';
        $this->privateArrayProperty            = ['privateArrayProperty'];
        $this->privateNullableArrayProperty    = ['privateArrayProperty'];
        $this->privateIterableProperty         = ['privateIterableProperty'];
        $this->privateNullableIterableProperty = ['privateIterableProperty'];
    }
}
